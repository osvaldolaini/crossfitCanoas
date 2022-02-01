    {{-- Partners --}}
    @include('site.sections.partners')
    <!-- footer -->
    <footer class="custom-footer custom-section mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-5 ">
                    <div class="hr-white mb-3"></div>
                    <h5 class="mb-2 f-bebas">ONDE ESTAMOS</h5>
                    <p class="mt-0">
                        {{ $config->addresses->first()->address }},
                        {{ $config->addresses->first()->number }},
                        {{ $config->addresses->first()->district }},
                        {{ $config->addresses->first()->city }} - {{ $config->addresses->first()->state }}<br>
                        <i class="fa fa-phone fa-lg"></i>{{ $config->phone }}<br>
                        <i class="fab fa-whatsapp fa-lg"></i>{{ $config->whats }}<br>
                        <i class="fa fa-envelope fa-lg"></i> {{ $config->email }}<br>
                    </p>
                    <div class="hr-white my-3"></div>
                    <h5 class="mb-2 f-bebas">Certificações</h5>
                    <div class="container">
                        <div class="row">
                            <div class="pl-0 col-sm-12 col-md-12">
                                <a href="http://journal.crossfit.com/" class="mr-2">
                                    <picture>
                                        <source data-srcset="{{ url('storage/images/site/white-300x150.png') }}"
                                            class="lazyload">
                                        <source data-srcset="{{ url('storage/images/site/white-300x150.webp') }}"
                                            class="lazyload">
                                        <img data-src="{{ url('storage/images/site/white-300x150.webp') }}"
                                            alt="crossfit_journal" style="width:auto;" class="lazyload">
                                    </picture>
                                </a>
                                <a href="http://www.crossfit.com/">
                                    <picture>
                                        <source data-srcset="{{ url('storage/images/site/aff_crossfit.png') }}"
                                            class="lazyload">
                                        <source data-srcset="{{ url('storage/images/site/aff_crossfit.webp') }}"
                                            class="lazyload">
                                        <img data-src="{{ url('storage/images/site/aff_crossfit.webp') }}"
                                            alt="aff_crossfit" style="width:auto;" class="lazyload">
                                    </picture>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 ">
                    <div class="hr-white mb-3"></div>
                    <h5 class="mb-2 f-bebas">Siga-nos nas rede sociais</h5>
                    <ul class="list-inline mb-0">
                        @if (isset($menu['socialMedias']))
                            @foreach ($menu['socialMedias'] as $socialMedia)
                                <li class="list-inline-item" data-aos="fade-up">
                                    <a class="btn btn-outline-light btn-social ext-center rounded-circle"
                                        href="{{ $socialMedia->link }}" target="_blank">
                                        <i class="fab fa-fw {{ $socialMedia->icon }}"></i>
                                    </a>
                                </li>

                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 mb-5 text-center py-1 px-1">
                    <iframe
                        data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13827.600777140946!2d-51.1833053!3d-29.9535493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d37d3624d882877!2sCrossFit+Canoas!5e0!3m2!1spt-BR!2sbr!4v1518352510053"
                        frameborder="0" style="border:0; height:100%; width:100%;" allowfullscreen=""
                        class="lazyload"></iframe>
                </div>
            </div>
        </div>
    </footer>
