@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')

    <section class="custom-section">
        <div class="container about-page section_title">
            <div class="row">
                <div class="col-xl-12 col-lg-12 mt-0 pt-0">
                    <div class="about_text">
                        {!! $config->about !!}
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="text-left font-custom">
                                <div class="row justify-content-center no-gutters">
                                    <div class="col-md-12 heading-section text-center mt-4">
                                        <span class="subheading">Contatos</span>
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
                            <div class="row justify-content-center no-gutters">
                                <div class="col-md-12 heading-section text-center mt-4">
                                    <span class="subheading">Nossas redes sociais</span>
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
    {{-- About --}}
    @include('site.sections.players')
    {{-- Articles --}}
    @include('site.sections.articles')
    {{-- About --}}
    @include('site.sections.newsletter')

@stop
