<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Model\Admin\Config;

use App\Model\Admin\SocialMedia;
use App\Model\Admin\Article;
use Jorenvh\Share\Share;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

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
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
            'menu'          =>  $this->menu(),
            'social'        =>  $this->share('noticias/' . $article->slug, $article->title),
        ]);
    }
    public function term()
    {
        $config = Config::get()->first();

        return view('site.term', [
            'title_postfix' => 'Termo de uso',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
        ]);
    }
    public function politics()
    {

        $config = Config::get()->first();
        return view('site.politics', [
            'title_postfix' => 'Política de privacidade',
            'config'        =>  $config,
            'menu'          =>  $this->menu(),
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
        ]);
    }

    /*Youtube */
    public function youtube()
    {
        $config = Config::get()->first();
        // $channelId = $config->youtube;
        $channelId = 'UC9sWQoZ0Ww6phxnRoSGYmPQ';
        $videoLists = $this->_videoLists($channelId);

        return view('site.youtube.index', [
            'title_postfix' => 'Nossos vídeos',
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
            'config'        =>  $config,
            'videoLists'    =>  $videoLists,
            'tags'          =>  'crossfit em canoas, crossfit canoas, crossfit, treinamento funcional, academia',
            'menu'          =>  $this->menu(),
        ]);
    }
    public function watch($id)
    {
        $config = Config::get()->first();
        // $channelId = $config->youtube;
        $channelId = 'UC9sWQoZ0Ww6phxnRoSGYmPQ';
        $videoDateLists = $this->_videoListsOrder($channelId,'date');
        $videoViewsLists = $this->_videoListsOrder($channelId,'viewCount');
        $singleVideo = $this->_singleVideo($id);
        return view('site.youtube.watch', [
            'title_postfix' =>  $singleVideo->items[0]->snippet->title,
            'img_jarallax'  =>  'crossfit-canoas-home-1.jpg',
            'config'        =>  $config,
            'videoDateLists'    =>  $videoDateLists,
            'videoViewsLists'    =>  $videoViewsLists,
            'singleVideo'   =>  $singleVideo,
            'tags'          =>  'crossfit em canoas, crossfit canoas, crossfit, treinamento funcional, academia',
            'menu'          =>  $this->menu(),
        ]);
    }
    // We will get search result here
    protected function _videoLists($channelId)
    {
        $order = 'date';
        $part = 'snippet';
        $country = 'BD';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 6;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video'; // You can select any one or all, we are getting only videos

        $url = "$youTubeEndPoint?regionCode=$country&order=$order&channelId=$channelId&part=$part&maxResults=$maxResults&type=$type&key=$apiKey";
        
        $response = Http::get($url);
        $results = json_decode($response);
        // echo '<pre>';
        // print_r($results);
        // exit;
        // // We will create a json file to see our response
        // File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }
    // We will get search result here
    protected function _videoListsOrder($channelId,$order)
    {
 
        $part = 'snippet';
        $country = 'BD';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 4;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video'; // You can select any one or all, we are getting only videos

        $url = "$youTubeEndPoint?regionCode=$country&order=$order&channelId=$channelId&part=$part&maxResults=$maxResults&type=$type&key=$apiKey";

        $response = Http::get($url);
        $results = json_decode($response);
        // echo '<pre>';
        // print_r($results);
        // exit;
        // // We will create a json file to see our response
        // File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }

    protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        // Will create a json file to see our single video details
        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }
}
