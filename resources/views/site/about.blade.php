@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')

    <section class="custom-section">
        <div class="container about-page section_title">
            <div class="row">
                <div class="col-xl-12 col-lg-12 mt-0 pt-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="about_text">
                                {!! $config->about !!}
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <iframe
                                data-src="https://www.google.com/maps/embed?pb=!4v1518479501512!6m8!1m7!1sCAoSLEFGMVFpcE5qdk5sam0yMGZmOUFuWFQ0OWtwMEp6TlExVFBQb1VERHVxYzJj!2m2!1d-29.953755456717!2d-51.183240804677!3f15.44!4f6.359999999999999!5f0.4000000000000002"
                                height="450" frameborder="0" style="border:0; width:100%;" allowfullscreen
                                class="lazyload"></iframe>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="text-left font-custom">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="heading-section-dark" data-aos="fade-up" data-aos-delay="100">
                                           <span> Contatos</span>
                                        </h2>
                                    </div>
                                </div>
                                <ul class="list-unstyled font-custom">
                                    <!--<li><i class="fas fa-map-marker"></i>
                                            <a href="#" class="font-custom">{{ $config->addresses->first()->address }},
                                                {{ $config->addresses->first()->number }},
                                                {{ $config->addresses->first()->district }},
                                                {{ $config->addresses->first()->city }} -
                                                {{ $config->addresses->first()->state }}.</a>
                                        </li>-->
                                    <li>
                                        <a href="#" class="font-custom"><i class="fab fa-whatsapp"></i>
                                            {{ $config->phone }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-custom"><i class="fas fa-mail-bulk"></i>
                                            {{ $config->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h2 class="heading-section-dark" data-aos="fade-up" data-aos-delay="100">
                                       Nossas <span> redes sociais</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-12 font-custom ">
                                @if (isset($menu['socialMedias']))
                                    @foreach ($menu['socialMedias'] as $socialMedia)
                                        <a class="font-custom pr-1" title="Siga nossas redes sociais"
                                            href="{{ $socialMedia->link }}" target="_blank" data-aos="fade-up"
                                            data-aos-easing="ease-in-sine">
                                            <i class="fab fa-3x {{ $socialMedia->icon }}-square"></i>
                                        </a>
                                    @endforeach
                                @endif
                                <a class="font-custom" title="fale com Lokomotiv pelo whatsapp"
                                    href="https://web.whatsapp.com/send?phone=55{{ $config->whatsapp }}" target="_blank"
                                    data-aos="fade-up" data-aos-easing="ease-in-sine">
                                    <i class="fab fa-3x fa-whatsapp-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Newsletter --}}
    @include('site.sections.newsletter')
    {{-- Articles --}}
    @include('site.sections.articles')

@stop
