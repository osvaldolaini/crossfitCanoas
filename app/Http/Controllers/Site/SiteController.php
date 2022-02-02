<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;

use App\Model\Admin\Config;

use App\Model\Admin\SocialMedia;
use App\Model\Admin\Article;
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
        $config = Config::get()->first();

        return view('site.index', [
            'title_postfix' =>  'Home',
            'menu'          =>  $this->menu(),
            'config'        =>  $config,
        ]);
        
    }

    /*Sobre */
    public function about()
    {
        $config = Config::get()->first();
        return view('site.about', [
            'title_postfix' => 'Sobre',
            'img_jarallax'  =>  'crossfit-canoas-home-2.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
        ]);
    }
    /*O que é crossfit */
    public function who()
    {
        $config = Config::get()->first();
        return view('site.who', [
            'title_postfix' => 'O que é crossfit',
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
        ]);
    }
    /*Como começar */
    public function what()
    {
        $config = Config::get()->first();
        return view('site.what', [
            'title_postfix' => 'Como começar',
            'img_jarallax'  =>  'crossfit-canoas-home-3.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
        ]);
    }
    /*Como começar */
    public function modalities()
    {
        $config = Config::get()->first();
        return view('site.modalities', [
            'title_postfix' => 'Modalidades',
            'img_jarallax'  =>  'crossfit-canoas-home-4.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
        ]);
    }
    /*Horarios */
    public function timetable()
    {
        $config = Config::get()->first();
        return view('site.timetable', [
            'title_postfix' => 'Quadro horário',
            'img_jarallax'  =>  'crossfit-canoas-home-5.jpg',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
        ]);
    }
    
    /*Contatos */
    public function contact()
    {
        $config = Config::get()->first();
        return view('site.contact', [
            'title_postfix' => 'Contatos',
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
            'config'        =>  $config,
            'tags'          =>  'crossfit em canoas, crossfit canoas, crossfit, treinamento funcional, academia',
            'menu'          =>  $this->menu(),
        ]);
    }
    public function class()
    {
        $config = Config::get()->first();
        return view('site.contact', [
            'title_postfix' => 'Aula experimental',
            'img_jarallax'  =>  'crossfit-canoas-home-2.jpg',
            'config'        =>  $config,
            'tags'          =>  'crossfit em canoas, crossfit canoas, crossfit, treinamento funcional, academia',
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
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
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
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
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
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
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
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
        ]);
    }
}
