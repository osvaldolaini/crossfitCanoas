<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Admin\Matches;
use Illuminate\Http\Request;

class UpcomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiUpcoming = array();
        $matches = Matches::select('opponent_id','slug','date','hour')
        ->where('active',1)
        ->where('date','>',date('Y-m-d'))
        ->limit(5)->
        orderBy('date','asc')
        ->get();
        
        if(isset($matches)){
            foreach ($matches as $match) {
                if ($match->apponents->image) {
                    $logo_adv = url('storage/images/opponents/'.$match->apponents->id.'/mini_thumbnail.png');
                }else{
                    $logo_adv = url('storage/images/opponents/logo_adversario_mini.png');
                }
                $apiUpcoming[]=array(
                    'image'         => $logo_adv,
                    'alt'           => $match->slug,
                    'link'          => url('pre-jogo/'.$match->slug),
                    'data'          => date( 'd/m/Y' , strtotime($match->date)),
                    'hour'          => date( 'H:i' , strtotime($match->hour)),
                    'adversario'    => $match->apponents->nick,
                );
            }  
        }
        if(isset($apiUpcoming)){
            return response()->json(
                [
                    'success'=> true,
                    'data'   => $apiUpcoming,
                ]
            );
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'error'=> false,
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
