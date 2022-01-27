@extends('site.app')
@section('body')

    <section class="home-slider owl-carousel jarallax"
        style="background-image:url({{ url('storage/images/site/index.jpg') }});">
        @if (!empty($nexts))
            @foreach ($nexts as $next)
                @php $dataFinal = (strtotime($next->date) - strtotime(date('Y-m-d'))) /86400; @endphp
                <div class="slider-item">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row home_container">
                            @if ($next->local == 'Fora')
                                <div class="col-md-12 text p-4 " data-aos="fade-up">
                                    <div class="col-lg-10">
                                        <div class="home_content" data-animation-in="zoomInDown"
                                            data-animation-out="animate-out fadeOut">
                                            <div class="home_text d-flex flex-row align-items-center justify-content-start">
                                                <div>
                                                    {{ $dataFinal }}
                                                </div>
                                                <span>@if ($dataFinal > 1) Dias @else Dia @endif para esse confronto</span>
                                            </div>
                                            <div class="next_match">
                                                <div>
                                                    <div class="next_match_home">
                                                        <a href="#">{{ ucwords(strtolower($next->apponents->nick)) }}</a>
                                                    </div>

                                                    <!--<div class="vs">vs</div>-->
                                                    <div class="next_match_guest">
                                                        <a href="sobre">{{ ucwords(strtolower($config->nick)) }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 text p-4 " data-aos="fade-up">
                                    <div class="col-lg-10">
                                        <div class="home_content" data-animation-in="zoomInDown"
                                            data-animation-out="animate-out fadeOut">
                                            <div class="home_text d-flex flex-row align-items-center justify-content-start">
                                                <div>
                                                    {{ $dataFinal }}
                                                </div>
                                                <span>@if ($dataFinal > 1) Dias @else Dia @endif para esse confronto</span>
                                            </div>
                                            <div class="next_match">
                                                <div>
                                                    <div class="next_match_home">
                                                        <a href="sobre">{{ ucwords(strtolower($config->nick)) }}</a>
                                                    </div>
                                                    <!--<div class="vs">vs</div>-->
                                                    <div class="next_match_guest">
                                                        <a href="#">{{ ucwords(strtolower($next->apponents->nick)) }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="slider-item">
                <div class="overlay"></div>
                <div class="container">
                    <div class="home_container w-100">
                        <div class="col-md-10 text p-4 " data-aos="fade-up">
                            <div class="col-lg-10">
                                <div class="home_content" data-animation-in="zoomInDown"
                                    data-animation-out="animate-out fadeOut">
                                    <div class="home_text d-flex flex-row align-items-center justify-content-start">
                                        <span>Agenda em atualização!</span>
                                    </div>
                                    <div class="next_match">
                                        <div>
                                            <div class="next_match_home">
                                                <a href="#">Aguarde...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    {{-- Breaking News --}}
    @include('site.sections.breaking_news')

    <section class="custom-section">
        <div class="container section-results">
            <div class="row">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_title text-center">
                            <h1>último jogo</h1>
                        </div>
                    </div>
                </div>
            </div>

            @php $logo_adv='storage/images/opponents/logo_adversario.png'; @endphp
            @if ($lastGame->apponents->image)
                @php $logo_adv='storage/images/opponents/'.$lastGame->apponents->id.'/player.png'; @endphp
            @endif
            <div class="row results_row">
                <div class="col">
                    <div class="results_title_container text-center">
                        <div class="results_title">resultado</div>
                        <div class="results_subtitle">
                            {{ date('d/m/Y', strtotime($lastGame->date)) }}, {{ $lastGame->field }}
                        </div>
                    </div>
                    @if ($lastGame->local == 'Fora')
                        <div class="results_container d-flex flex-row align-items-start justify-content-start">
                            <div class="result text-right">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="team_image d-flex flex-column align-items-start justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source
                                                srcset="{{ url('storage/images/opponents/' . $lastGame->apponents->id . '/player.png') }}" />
                                            <source
                                                srcset="{{ url('storage/images/opponents/' . $lastGame->apponents->id . '/player.webp') }}" />
                                            <img class="lazyload img-fluid"
                                                src="{{ url('storage/images/opponents/' . $lastGame->apponents->id . '/player.png') }}"
                                                alt="{{ $config->slug }}" />
                                        </picture>
                                    </div>
                                    <div class="text-center">
                                        <div class="result_num">{{ $lastGame->score_down }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team">{{ $lastGame->apponents->nick }}</div>
                                    <p>(Time da casa)</p>
                                </div>
                            </div>
                            <div class="result text-left">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="text-center">
                                        <div class="result_num float-top">{{ $lastGame->score_plus }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                    <div class="team_image d-flex flex-column align-items-end justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <img class="lazyload img-fluid" src="{{ url($logo_adv) }}"
                                                alt="{{ $lastGame->apponents->slug }}" />
                                        </picture>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team"><?= $config->nome ?></div>
                                    <p>(Visitante)</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="results_container d-flex flex-row align-items-start justify-content-start">
                            <div class="result text-right">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="team_image d-flex flex-column align-items-end justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source srcset="{{ url('storage/images/logos/logo.png') }}" />
                                            <source srcset="{{ url('storage/images/logos/logo.webp') }}" />
                                            <img class="lazyload img-fluid"
                                                src="{{ url('storage/images/logos/logo.png') }}"
                                                alt="{{ $config->slug }}" />
                                        </picture>
                                    </div>
                                    <div class="text-center">
                                        <div class="result_num ">{{ $lastGame->score_plus }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team">{{ $config->nick }}</div>
                                    <p>(Time da casa)</p>
                                </div>
                            </div>
                            <div class="result text-left">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="text-center">
                                        <div class="result_num">{{ $lastGame->score_down }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                    <div class="team_image d-flex flex-column align-items-end justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <img class="lazyload img-fluid" src="{{ url($logo_adv) }}"
                                                alt="{{ $lastGame->apponents->slug }}" />
                                        </picture>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team">{{ $lastGame->apponents->nick }}</div>
                                    <p>(Visitante)</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="button results_button"><a href="{{ url('noticias/' . $lastGame->article->slug) }}">Saiba como
                            foi</a></div>
                </div>
            </div>
        </div>

    </section>
    {{-- Upcoming & Last Results --}}
    @include('site.sections.upcoming')
    {{-- Upcoming & Last Results --}}
    @include('site.sections.counter')
    {{-- Articles --}}
    @include('site.sections.articles')

@stop
