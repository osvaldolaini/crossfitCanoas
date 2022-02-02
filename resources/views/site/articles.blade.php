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
        <section class="blog_area section_padding custom-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">

                            @foreach ($articles as $article)
                                @if ($article->images->count() > 0)
                                    @foreach ($article->images as $images)
                                            @php
                                                $img = 'storage/'.$images->path.$images->title;
                                            @endphp
                                    @endforeach
                                   
                                @else
                                    @php
                                        $img = 'storage/images/articles/articles.jpg';
                                    @endphp
                                @endif
                                
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{url($img)}}" alt="{{$article->slug}}">
                                        <a href="#" class="blog_item_date">
                                            <h3>{{($article->created_at ? date( 'd' , strtotime($article->created_at)) : "")}}</h3>
                                            <p>{{utf8_encode(strftime('%b' , strtotime($article->created_at)))}}</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{url('noticias/'.$article->slug)}}">
                                            <h2>{{ucwords(mb_strtolower($article->title))}}</h2>
                                        </a>
                                        <p class="pt-0 mt-0">{!!mb_strimwidth($article->text, 0, 150, "...")!!}</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="far fa-user"></i> {{ucwords(mb_strtolower($article->created_by))}}</a></li>
                                            <li><a href="#"><i class="far fa-eye"></i> {{$article->clicks}} </a></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach

                            <nav class="blog-pagination justify-content-center d-flex">
                                {{ $articles->links() }}
                            </nav>
                        </div>
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
                                @include('site.partials.adsNews')
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
