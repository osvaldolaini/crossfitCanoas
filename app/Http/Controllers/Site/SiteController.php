<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;

use App\Model\Admin\Config;

use App\Model\Admin\SocialMedia;
use App\Model\Admin\Article;
use App\Model\Admin\Athletes;
use App\Model\Admin\Matches;
use App\Model\Admin\Staff;
use App\Model\Admin\Stats;
use Jorenvh\Share\Share;
use League\CommonMark\Normalizer\SlugNormalizer;

class SiteController extends Controller
{
    public function menu()
    {

        $socialMedias = SocialMedia::select('link', 'icon')->where('active', 1)->get();

        $menu = array(
            'socialMedias'  =>  $socialMedias,
        );
        return $menu;
    }

    public function share($url, $title)
    {
        //SOCIAL SHARE
        $shareComponent = \Share::page(url($url), $title)
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp()->getRawLinks();
        //
        return $shareComponent;
    }

    public function index()
    {
        $date = date('Y-m-d');
        $nexts = Matches::where('active', 1)->where('date', '>=', $date)->limit(5)->orderBy('date', 'asc')->get();
        $config = Config::get()->first();
        $lastNews = Article::select('title')->orderBy('created_at', 'desc')->limit(5)->get();
        $lastGame =  Matches::where('active', 1)->where('date', '<=', $date)->orderBy('date', 'desc')->first();
       
        $matches = Matches::where('active', 1)->where('date', '>', date('Y') . '01-01')->get();
        $gols = 0;
        $wins = 0;
        foreach ($matches as $match) {
            $gols += $match->score_plus;
            if ($match->score_plus > $match->score_down) {
                $wins += 1;
            }
        }
        return view('site.index', [
            'title_postfix' =>  'Home',
            'menu'          =>  $this->menu(),
            'config'        =>  $config,
            'nexts'         =>  $nexts,
            'lastNews'      =>  $lastNews,
            'lastGame'      =>  $lastGame,
            'players'       =>  Athletes::where('active', 1)->count(),
            'matches'       =>  Matches::where('active', 1)->where('date', '>', date('Y') . '01-01')->count(),
            'wins'          =>  $wins,
            'gols'          =>  $gols,
        ]);
    }

    /*Sobre */
    public function about()
    {
        $config = Config::get()->first();
        $players = Athletes::where('active', 1)->limit(6)->inRandomOrder()->get();
        $allPlayers = array();
        foreach ($players as $player) {
            $allPlayers[] = [
                'id'        => $player->id,
                'slug'      => $player->slug,
                'number'    => $player->number,
                'nick'      => $player->nick,
                'position'  => Functions::positions($player->position),
                'image'     => ($player->image ? url('storage/images/athletes/' . $player->id . '/player.png') : url('storage/images/logos/logo.png')),
            ];
        }
        return view('site.about', [
            'title_postfix' => 'Sobre',
            'img_jarallax'  =>  'about.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
            'players'       =>  $allPlayers,
        ]);
    }
    /*Pré jogo */
    public function preview($any)
    {
        $match = Matches::where('slug', $any)->first();
        $history = Matches::where('active',1)->where('date','<=',date('Y-m-d'))->orderBy('date','desc')->where('opponent_id', $match->opponent_id)->get();
        $config = Config::get()->first();
        $title = $config->nick. ' vs ' .$match->apponents->nick;
        //SOCIAL SHARE
        $shareComponent = \Share::page(url('pre-jogo/' . $match->slug), $title)
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp()->getRawLinks();
        // 
        return view('site.preview', [
            'title_postfix' => $title,
            'config'        =>  $config,
            'subtext'       => 'Pré jogo',
            'sublink'       => 'elenco',
            'match'         =>  $match,
            'history'       =>  $history,
            'config'        =>  $config,
            'img_jarallax'  =>  'about.jpg',
            'menu'          =>  $this->menu(),
            'social'        =>  $this->share('pre-jogo/' . $match->slug, $title),
        ]);
    }
    /*Estatisticas */
    public function stats()
    {
        $config = Config::get()->first();
        $players = Athletes::where('active', 1)->inRandomOrder()->get();
        $allPlayers = array();

        $games = Matches::where('active', 1)->get();
        $pro = 0;
        $contra = 0;
        $cards = 0;
        $vitorias = 0;
        $derrotas = 0;
        $empates = 0;
        foreach ($games as $game) {

            if ($game->active == 1) {
                if (date("Y-m-d") > $game->date) {
                    $pro += $game->score_plus;
                    $contra += $game->score_down;
                    $cards += $game->yellow_card;
                    $cards += $game->red_card;

                    if ($game->score_plus == $game->score_down) {
                        $empates += 1;
                    } elseif ($game->score_plus > $game->score_down) {
                        $vitorias += 1;
                    } else {
                        $derrotas += 1;
                    }
                }
            }

            $scores = array(
                'pro'       => $pro,
                'contra'    => $contra,
                'cards'     => $cards,
                'vitorias'  => $vitorias,
                'derrotas'  => $derrotas,
                'empates'   => $empates,
                'games'     => $games->count(),
            );
        }

        $new = date('Y') . '-01-01';
        $gamesNew = Matches::where('active', 1)->where('date', '>', $new)->get();
        $proN = 0;
        $contraN = 0;
        $cardsN = 0;
        $vitoriasN = 0;
        $derrotasN = 0;
        $empatesN = 0;
        $scoresN = array(
            'pro'       => $proN,
            'contra'    => $contraN,
            'cards'     => $cardsN,
            'vitorias'  => $vitoriasN,
            'derrotas'  => $derrotasN,
            'empates'   => $empatesN,
        );

        foreach ($gamesNew as $gn) {
            if ($gn->active == 1) {
                if (date("Y-m-d") > $gn->date) {
                    $proN += $gn->score_plus;
                    $contraN += $gn->score_down;
                    $cardsN += $gn->yellow_card;
                    $cardsN += $gn->red_card;

                    if ($gn->score_plus == $gn->score_down) {
                        $empatesN += 1;
                    } elseif ($gn->score_plus > $gn->score_down) {
                        $vitoriasN += 1;
                    } else {
                        $derrotasN += 1;
                    }
                }
            }

            $scoresN = array(
                'pro'       => $proN,
                'contra'    => $contraN,
                'cards'     => $cardsN,
                'vitorias'  => $vitoriasN,
                'derrotas'  => $derrotasN,
                'empates'   => $empatesN,
                'games'     => $games->count(),
            );
            $athletes = Athletes::select('id', 'nick', 'name', 'number', 'position','slug')->get();
            $players = array();

            foreach ($athletes as $athlete) {
                $g = 0;
                $a = 0;
                $y = 0;
                $r = 0;
                $j = 0;
                $ng = 0;
                $na = 0;
                $ny = 0;
                $nr = 0;
                $nj = 0;
                $score = Stats::where('athlete_id', $athlete->id)->get();
                $new = date('Y') . '-01-01';
                $newSeason = Stats::where('athlete_id', $athlete->id)->where('date_game', '>', $new)->get();

                foreach ($score as $s) {
                    if ($s->active == 1) {
                        $j += 1;
                    }
                    $g += $s->gols;
                    $a += $s->assist;
                    $y += $s->yellow_card;
                    $r += $s->red_card;
                }

                foreach ($newSeason as $ns) {
                    if ($ns->active == 1) {
                        $nj += 1;
                    }
                    $ng += $ns->gols;
                    $na += $ns->assist;
                    $ny += $ns->yellow_card;
                    $nr += $ns->red_card;
                }

                $gols[] = array(
                    'position'  => Functions::positions($athlete->position),
                    'atleta'    => $athlete->nick . ' (' . $athlete->number . ')',
                    'link'    => 'atletas/' . $athlete->slug,
                    'numero'    => $athlete->number,
                    'nsgols'  => $ng,
                    'gols'  => $g,
                    'njogos'  => $nj,
                    'jogos'  => $j,
                );
                $assist[] = array(
                    'position'  => Functions::positions($athlete->position),
                    'atleta'    => $athlete->nick . ' (' . $athlete->number . ')',
                    'link'    => 'atletas/' . $athlete->slug,
                    'numero'    => $athlete->number,
                    'nsassists'  => $na,
                    'assists'  => $a,
                    'njogos'  => $nj,
                    'jogos'  => $j,
                );
                $fairplay[] = array(
                    'position'  => Functions::positions($athlete->position),
                    'atleta'    => $athlete->nick . ' (' . $athlete->number . ')',
                    'link'      => 'atletas/' . $athlete->slug,
                    'numero'    => $athlete->number,
                    'nsyellows'  => $ny,
                    'yellows'  => $y,
                    'nsreds'  => $nr,
                    'reds'  => $r,
                );
            }
            $shareComponent = \Share::page(url('nossos-numeros'), 'Estatísticas do time')
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp()->getRawLinks();
            return view('site.stats', [
                'title_postfix' => 'Estatísticas',
                'img_jarallax'  =>  'about.jpg',
                'config'        =>  $config,
                'menu'          =>  $this->menu(),
                'players'       =>  $allPlayers,
                'score'         => $scores,
                'scoreN'        => $scoresN,
                'nsgols'        => Functions::array_sort($gols, 'nsgols', SORT_DESC),
                'nsassist'      => Functions::array_sort($assist, 'nsassists', SORT_DESC),
                'nscards'       => Functions::array_orderby($fairplay, 'nsreds', SORT_DESC, 'nsyellows', SORT_DESC),
                'gols'          => Functions::array_sort($gols, 'gols', SORT_DESC),
                'assist'        => Functions::array_sort($assist, 'assists', SORT_DESC),
                'cards'         => Functions::array_orderby($fairplay, 'reds', SORT_DESC, 'yellows', SORT_DESC),
                'social'        =>  $this->share('nossos-numeros', 'Estatísticas do time')
            ]);;
        }
    }

    /*Elenco */
    public function team()
    {
        $config = Config::get()->first();
        $staffs = Staff::where('active', 1)->get();
        $players = Athletes::where('active', 1)->get();
        $allPlayers = array();
        foreach ($players as $player) {
            $allPlayers[] = [
                'id'        => $player->id,
                'slug'      => $player->slug,
                'number'    => $player->number,
                'nick'      => $player->nick,
                'position'  => Functions::positions($player->position),
                'image'     => ($player->image ? url('storage/images/athletes/' . $player->id . '/player.png') : url('storage/images/logos/logo.png')),
            ];
        }
        return view('site.team', [
            'title_postfix' => 'Elenco',
            'img_jarallax'  =>  'about.jpg',
            'config'        =>  $config,
            'staffs'        =>  $staffs,
            'players'       =>  $allPlayers,

            'menu'          =>  $this->menu(),
        ]);
    }

    public function player($any)
    {
        
        $player = Athletes::where('slug', $any)->first();
        $config = Config::get()->first();
            $g = 0;
            $a = 0;
            $y = 0;
            $r = 0;
            $j = 0;
            $ng = 0;
            $na = 0;
            $ny = 0;
            $nr = 0;
            $nj = 0;
            $score = Stats::where('athlete_id', $player->id)->get();
            $new = date('Y') . '-01-01';
            $newSeason = Stats::where('athlete_id', $player->id)->where('date_game', '>', $new)->get();

            foreach ($score as $s) {
                if ($s->active == 1) {
                    $j += 1;
                }
                $g += $s->gols;
                $a += $s->assist;
                $y += $s->yellow_card;
                $r += $s->red_card;
            }

            foreach ($newSeason as $ns) {
                if ($ns->active == 1) {
                    $nj += 1;
                }
                $ng += $ns->gols;
                $na += $ns->assist;
                $ny += $ns->yellow_card;
                $nr += $ns->red_card;
            }

            $athlete = array(
                'position'  => Functions::positions($player->position),
                'image'     => ($player->image ? url('storage/images/athletes/' . $player->id . '/1.png') : url('storage/images/logos/logo.png')),
                'name'      => $player->name,
                'nick'      => $player->nick,
                'link'      => 'atletas/' . $player->slug,
                'slug'      => $player->slug,
                'birthday'  => ($player->since ? date( 'd/m' , strtotime($player->since)) : ""),
                'number'    => $player->number,
                'foot'      => $player->foot,
                'nsgols'    => $ng,
                'gols'      => $g,
                'njogos'    => $nj,
                'jogos'     => $j,
                'nsassists' => $na,
                'assists'   => $a,
                'nsyellows' => $ny,
                'yellows'   => $y,
                'nsreds'    => $nr,
                'reds'      => $r,
                'twitter'   => $player->twitter,
                'facebook'  =>$player->facebook,
                'instagram' => $player->instagram,
                'youtube'   =>$player->youtube,
            );
            
        //Visualizacoes
        $player->clicks = $player->clicks + 1;
        $player->save();
        //Visualizacoes

        //SOCIAL SHARE
        $shareComponent = \Share::page(url('atleta/' . $player->slug), $player->name)
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp()->getRawLinks();
        //
        return view('site.player', [
            'title_postfix' => $player->name . ' (' . $player->number . ')',
            'subtext'       => 'Atletas',
            'sublink'       => 'elenco',
            'player'        =>  $athlete,
            'config'        =>  $config,
            'img_jarallax'  =>  'about.jpg',
            'menu'          =>  $this->menu(),
            'social'        =>  $this->share('atleta/' . $player->slug, $player->name),
        ]);
    }
    /*Staff */
    public function staff($any)
    {
        $staff = Staff::where('slug', $any)->first();
        $config = Config::get()->first();
        /*Visualizacoes
        $staff->clicks = $staff->clicks + 1;
        $staff->save();
        Visualizacoes*/

        //SOCIAL SHARE
        $shareComponent = \Share::page(url('comissao/' . $staff->slug), $staff->name)
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp()->getRawLinks();
        //
        return view('site.staff', [
            'title_postfix' => $staff->name . ' (' . $staff->nick . ')',
            'subtext'       => 'Comissão',
            'sublink'       => 'elenco',
            'player'        =>  $staff,
            'config'        =>  $config,
            'img_jarallax'  =>  'about.jpg',
            'menu'          =>  $this->menu(),
            'social'        =>  $this->share('comissao/' . $staff->slug, $staff->title),
        ]);
    }

    /*Contatos */
    public function contact()
    {
        $config = Config::get()->first();
        return view('site.contact', [
            'title_postfix' => 'Contatos',
            'img_jarallax'  =>  'contact.jpg',
            'config'        =>  $config,
            'tags'          =>  'conceptum,engenharia, obras, reformas, impermeabilização CONTATOS',
            'menu'          =>  $this->menu(),
        ]);
    }

    //Artigos
    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')->where('active', 1)->paginate(6);

        $trendTopics = Article::select('id', 'slug', 'title', 'created_at')
            ->where('active', 1)
            ->orderBy('clicks', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)->get();

        $seeMore = Article::where('active', 1)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $config = Config::get()->first();
        return view('site.articles', [
            'title_postfix' =>  'Notícias',
            'img_jarallax'  =>  'about.jpg',
            'config'        =>  $config,
            'articles'      =>  $articles,
            'trendTopics'   =>  $trendTopics,
            'seeMore'       =>  $seeMore,
            'menu'          =>  $this->menu(),
        ]);
    }

    public function article($any)
    {
        $article = Article::where('slug', $any)->first();
        $players = array();
            if ( $article->match_id) {
                $match = Matches::where('id', $article->match_id)->first();
                $stats = Stats::where('match_id', $article->match_id)->where('active', 1)->get();
                foreach ($stats as $stat){
                    $players []= [ 
                        'name'      => $stat->player->name,
                        'nick'      => $stat->player->nick,
                        'number'    => $stat->player->number,
                        'foot'      => $stat->player->foot,
                        'position'  => Functions::positions($stat->player->position),
                        'gols'      => $stat->gols,
                        'assist'    => $stat->assist,
                        'yellow_card'=> $stat->yellow_card,
                        'red_card'  => $stat->red_card,
                    ];
                }
               
            }else{
                $match = null;
                $stats = null;
            }
            // print_r($stats);
            // exit;
        $config = Config::get()->first();
        
        $images = $article->images()->get();

        $trendTopics = Article::select('id', 'slug', 'title', 'created_at')
            ->where('active', 1)
            ->orderBy('clicks', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)->get();

        $seeMore = Article::where('active', 1)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        //Visualizacoes
        $article->clicks = $article->clicks + 1;
        $article->save();
        //Visualizacoes

        //SOCIAL SHARE
        $shareComponent = \Share::page(url('noticias/' . $article->slug), $article->title)
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp()->getRawLinks();
        //
        return view('site.article', [
            'title_postfix' => $article->title,
            'subtext'       => 'Notícias',
            'sublink'       => 'noticias',
            'config'        =>  $config,
            'article'       =>  $article,
            'dataPage'      =>  $article,
            'urlPage'       =>  'noticias/' . $article->slug,
            'trendTopics'   =>  $trendTopics,
            'seeMore'       =>  $seeMore,
            'tags'          =>  $article->tags,
            'images'        =>  $images,
            'match'         =>  $match,
            'players'         =>  $players,
            'img_jarallax'  =>  'about.jpg',
            'menu'          =>  $this->menu(),
            'social'        =>  $this->share('noticias/' . $article->slug, $article->title),
        ]);
    }

    public function term()
    {
        $socialMedias = SocialMedia::where('active', 1)->get();
        $config = Config::get()->first();
        $players = Athletes::where('active', 1)->limit(6)->inRandomOrder()->get();
        $allPlayers = array();
        foreach ($players as $player) {
            $allPlayers[] = [
                'id'        => $player->id,
                'slug'      => $player->slug,
                'number'    => $player->number,
                'nick'      => $player->nick,
                'position'  => Functions::positions($player->position),
                'image'     => ($player->image ? url('storage/images/athletes/' . $player->id . '/player.png') : url('storage/images/logos/logo.png')),
            ];
        }
        return view('site.term', [
            'title_postfix' => 'Termo de uso',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
            'players'       =>  $allPlayers,
            'img_jarallax'  =>  'about.jpg',
        ]);
    }
    public function politics()
    {
        $socialMedias = SocialMedia::where('active', 1)->get();
        $players = Athletes::where('active', 1)->limit(6)->inRandomOrder()->get();
        $allPlayers = array();
        foreach ($players as $player) {
            $allPlayers[] = [
                'id'        => $player->id,
                'slug'      => $player->slug,
                'number'    => $player->number,
                'nick'      => $player->nick,
                'position'  => Functions::positions($player->position),
                'image'     => ($player->image ? url('storage/images/athletes/' . $player->id . '/player.png') : url('storage/images/logos/logo.png')),
            ];
        }
        $config = Config::get()->first();

        return view('site.politics', [
            'title_postfix' => 'Política de privacidade',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
            'players'       =>  $allPlayers,
            'img_jarallax'  =>  'about.jpg',
        ]);
    }
}
