@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')

    <section class="custom-section">
        <div class="container section-results">
            @php $logo_adv='storage/images/opponents/logo_adversario.png'; @endphp
            @if ($match->apponents->image)
                @php $logo_adv='storage/images/opponents/'.$match->apponents->id.'/player.png'; @endphp
            @endif
            <div class="row results_row">
                <div class="col">
                    <div class="results_title_container text-center">
                        <div class="results_title">Chamada do jogo</div>
                        <div class="results_subtitle">
                            {{ date('d/m/Y', strtotime($match->date)) }}, {{ $match->field }}
                        </div>
                    </div>
                    @if ($match->local == 'Fora')
                        <div class="results_container d-flex flex-row align-items-start justify-content-start">
                            <div class="result text-right">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="team_image d-flex flex-column align-items-start justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source
                                                srcset="{{ url('storage/images/opponents/' . $match->apponents->id . '/player.png') }}" />
                                            <source
                                                srcset="{{ url('storage/images/opponents/' . $match->apponents->id . '/player.webp') }}" />
                                            <img class="lazyload img-fluid"
                                                src="{{ url('storage/images/opponents/' . $match->apponents->id . '/player.png') }}"
                                                alt="{{ $config->slug }}" />
                                        </picture>
                                    </div>
                                    <div class="text-center">
                                        <div class="result_num">{{ $match->score_down }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team">{{ $match->apponents->nick }}</div>
                                    <p>(Time da casa)</p>
                                </div>
                            </div>
                            <div class="result text-left">
                                <div class="result_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="text-center">
                                        <div class="result_num float-top">{{ $match->score_plus }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                    <div class="team_image d-flex flex-column align-items-end justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <img class="lazyload img-fluid" src="{{ url($logo_adv) }}"
                                                alt="{{ $match->apponents->slug }}" />
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
                                        <div class="result_num ">{{ $match->score_plus }}</div>
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
                                        <div class="result_num">{{ $match->score_down }}</div>
                                        <div class="result_team"></div>
                                    </div>
                                    <div class="team_image d-flex flex-column align-items-end justify-content-end">
                                        <picture class="lazyload img-fluid">
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <source srcset="{{ url($logo_adv) }}" />
                                            <img class="lazyload img-fluid" src="{{ url($logo_adv) }}"
                                                alt="{{ $match->apponents->slug }}" />
                                        </picture>
                                    </div>
                                </div>
                                <div class="result_text text-center">
                                    <div class="result_team">{{ $match->apponents->nick }}</div>
                                    <p>(Visitante)</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                        @include('site.partials.socialShare')
                </div>
            </div>
            <div class="row pb-5">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_title text-center">
                            <h1>últimos jogos</h1>
                            
                        <div class="section_subtitle">Resultados</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Latest Games -->
                <div class="col custom_lists_col">
                    <div class="custom_list_b">
                        <ul>
                            @foreach ($history as $matches)
                                @if ($matches->apponents->image) 
                                    @php
                                        $logo_adv = url('storage/images/opponents/'.$matches->apponents->id.'/mini_thumbnail.png');
                                    @endphp
                                @else
                                    @php
                                        $logo_adv = url('storage/images/opponents/logo_adversario_mini.png');
                                    @endphp
                                @endif
                            <li class="d-flex flex-row align-items-center justify-content-end">
                                <div class="d-flex flex-row align-items-center justify-content-end">
                                    <div class="team_logo d-flex flex-column align-items-center justify-content-center">
                                        <picture>
                                            <source type="image/webp" data-srcset="{{url('storage/images/site/logo_mini.webp')}}" />
                                            <source type="image/png" data-srcset="{{url('storage/images/site/logo_mini.png')}}" />
                                            <img class="lazyload" data-src="{{url('storage/images/site/logo_mini.png')}}" alt="logo_mini">
                                        </picture>
                                    </div>
                                    <div class="team_name"><a href="{{url('noticias/'.$matches->slug)}}">{{$config->nick}}</a></div>
                                </div>
                                <div class="text-center">
                                    <div class="placar_up">{{$matches->score_plus}} : {{$matches->score_down}} </div>
                                    <div></div>
                                    <div>
                                        <a href="{{url('noticias/'.$matches->slug)}}">
                                            {{date( 'd/m/Y' , strtotime($matches->date))}} ( {{date( 'H:i' , strtotime($matches->hour))}} h)
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="team_name text-right"> 
                                        <a href="{{url('noticias/'.$matches->slug)}}">
                                            {{$matches->apponents->nick}}
                                        </a>
                                    </div>
                                    <div class="team_logo d-flex flex-column align-items-center justify-content-center">
                                        <img class="lazyload" src="{{$logo_adv}}" alt="{{$matches->slug}}">
                                    </div>
                                </div>
                            </li>
                            
                            @endforeach
                        </ul>
                        @include('site.partials.adsPlayer')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Articles --}}
    @include('site.sections.articles')
    {{-- About --}}
    @include('site.sections.newsletter')

@stop
