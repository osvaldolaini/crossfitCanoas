@extends('site.app')
@section('body')
    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')
    @php
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    @endphp

    {{-- Info --}}
    <!--================Blog Area =================-->
    <section class="blog_area section_padding assgapa-section mt-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <div class="container" id="jssor_1"
                                style="left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;">
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin"
                                    style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                                        src="{{ url('storage/images/site/spin.svg') }}" />
                                </div>
                                <div data-u="slides"
                                    style="cursor:default;position:relative;left:240px;width:720px;height:480px;overflow:hidden;">
                                    @if ($article->images->count() > 0)
                                        @foreach ($article->images as $image)
                                            @php
                                                $img = explode('.', $image->title);
                                                $extension = $img[1];
                                                $thumb = $img[0] . '-thumbnail.' . $extension;
                                            @endphp
                                            <div>
                                                <img data-u="image"
                                                    src="{{ url('storage/' . $image->path . $image->title) }}" />
                                                <img data-u="thumb" src="{{ url('storage/' . $image->path . $thumb) }}" />
                                            </div>
                                        @endforeach
                                    @else
                                   
                                            <div>
                                                <img data-u="image"
                                                    src="{{ url('storage/images/articles/article.jpg') }}" />
                                                <img data-u="thumb" src="{{ url('storage/images/articles/article-thumbnail.jpg') }}" />
                                            </div>
                                    @endif
                                </div>
                                <!-- Thumbnail Navigator -->
                                <div data-u="thumbnavigator" class="jssort101"
                                    style="position:absolute;left:0px;top:0px;width:240px;height:480px;" data-autocenter="2"
                                    data-scale-left="0.75">
                                    <div data-u="slides">
                                        <div data-u="prototype" class="p" style="width:99px;height:66px;">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                            <svg viewbox="0 0 16000 16000" class="cv">
                                                <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                                <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000">
                                                </line>
                                                <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora093"
                                    style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
                                    <svg viewbox="0 0 16000 16000"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 ">
                                        </polyline>
                                        <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora093"
                                    style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
                                    <svg viewbox="0 0 16000 16000"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 ">
                                        </polyline>
                                        <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                                    </svg>
                                </div>
                            </div>



                        </div>
                        <div class="blog_details">
                            <h2>{{ $article->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="far fa-user"></i>
                                        {{ ucwords(mb_strtolower($article->created_by)) }}</a></li>
                                <li><a href="#"><i class="far fa-eye"></i> {{ $article->clicks }}</a></li>
                            </ul>

                            {!! $article->text !!}

                            @include('site.partials.socialShare')
                        </div>
                    </div>
                    @if ($article->match_id)
                        {{-- Game Stats --}}
                        @include('site.sections.gameStat')
                    @endif
                    
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title"><i class="fas fa-star"></i> Mais vistos </h3>
                            @foreach ($trendTopics as $trend)
                            @php
                                date_default_timezone_set("America/Sao_Paulo");
                            @endphp
                                <div class="media post_item"> 
                                    @if ($trend->images->count() > 0)
                                        @foreach ($trend->images as $images)
                                                @php
                                                    $img = 'storage/'.$images->path.$images->title;
                                                @endphp
                                        @endforeach
                                    
                                    @else
                                        @php
                                            $img = 'storage/images/articles/mini_trend_articles.jpg';
                                        @endphp
                                    @endif
                                    <img src="{{url($img)}}" alt="{{$trend->slug}}">
                                    <div class="media-body">
                                        <a href="{{url('noticias/'.$trend->slug)}}">
                                            <h3>{{ucwords(mb_strtolower(mb_strimwidth($trend->title, 0, 22, "...")))}}</h3>
                                        </a>
                                        <p>{{utf8_encode(strftime( '%d de %B de %Y' , strtotime($trend->created_at)))}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget" style="background-color: transparent !important;">
                            @include('site.partials.adsGoogle')
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title"><i class="fas fa-thumbs-up"></i> Você pode gostar </h3>
                            @foreach ($seeMore as $more)
                                    @if ($more->images->count() > 0)
                                        @foreach ($more->images as $images)
                                                @php
                                                    $img = 'storage/'.$images->path.$images->title;
                                                @endphp
                                        @endforeach
                                    
                                    @else
                                        @php
                                            $img = 'storage/images/articles/mini_more_articles.jpg';
                                        @endphp
                                    @endif
                                <div class="media post_item">
                                    <img src="{{url($img)}}" alt="{{$more->slug}}">
                                    <div class="media-body">
                                        <a href="{{url('noticias/'.$more->slug)}}">
                                            <h3>{{ucwords(mb_strtolower(mb_strimwidth($more->title, 0, 22, "...")))}}</h3>
                                        </a>
                                        <p>{{utf8_encode(strftime( '%d de %B de %Y' , strtotime($more->created_at)))}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget" style="background-color: transparent !important;">
                            @include('site.partials.adsNews')
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <div id="custom-newsletter">
                                <div class="newsletter" id="newsletter">
                                    <div class="newsletter_form_container">
                                        <form method="post" class="form-outline-style" id="newsletterForm" >
                                            <div class="d-flex flex-row align-items-start justify-content-start">
                                                <input type="email" class="newsletter_input" name="email"
                                                    placeholder="Insira seu email" required="required">
                                                <button class="newsletter_button">
                                                    <i class="far fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div id="newsletter-message-warning" class="mt-4"></div>
                                        <div id="newsletter-message-success">
                                            <p>Assinatura concluída, obrigado!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@stop
