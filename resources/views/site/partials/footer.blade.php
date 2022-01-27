    {{-- Partners --}}
    @include('site.sections.partners')
 <!-- footer -->
 <footer class="custom-footer custom-bg-dark custom-section mt-0">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
            <div class="custom-footer-widget mb-4">
                <h2 class="custom-heading-2">Lokomotiv Canoas FC</h2>
                <p>
                    {{ $config->meta_description }}
                </p>
                <ul class="custom-footer-social list-unstyled float-md-left float-lft mt-5">
                    @if (isset($menu['socialMedias']))
                        @foreach ($menu['socialMedias'] as $socialMedia)
                            <li data-aos="fade-up" data-aos-easing="ease-in-sine">
                                <a href="{{$socialMedia->link}}" target="_blank">
                                    <i class="fab fa-fw {{$socialMedia->icon}}"></i>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul> 
            </div>
            </div>
            <div class="col-md">
            <div class="custom-footer-widget mb-4 ml-md-5">
                <h2 class="custom-heading-2">Navegação</h2>
                <ul class="list-unstyled">
                    <li><a href="{{url('')}}">Home</a></li>
                    <li><a href="{{url('sobre')}}">Sobre</a></li>
                    <li><a href="{{url('elenco')}}">Elenco</a></li>
                    <li><a href="{{url('nossos-numeros')}}">Estatisticas</a></li>
                    <li><a href="{{url('noticias')}}">Artigos</a></li>
                    <li><a href="{{url('fale-conosco')}}">Contatos</a></li>
                    <li><a href="{{url('termo-de-uso')}}">Termo de uso</a></li>
                    <li><a href="{{url('politica-de-privacidade')}}">Política de privacidade</a></li>
                </ul>
            </div>
            </div>
            <div class="col-md">
            <div class="custom-footer-widget mb-4">
                <h2 class="custom-heading-2">Contatos</h2>
                <ul class="list-unstyled">
                    <!--<li><i class="fas fa-map-marker"></i>
                        <a href="#">{{ $config->addresses->first()->address}},
                        {{$config->addresses->first()->number}},
                        {{$config->addresses->first()->district}},
                        {{$config->addresses->first()->city}} - {{$config->addresses->first()->state}}.</a>
                    </li>-->
                    <li>
                        <a href="#"><i class="fab fa-whatsapp"></i>
                            {{ $config->phone }}
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-mail-bulk"></i>
                            {{ $config->email }}
                        </a>
                    </li>
                </ul>
            </div>
            </div>
            <div class="col-md">
            <div class="custom-footer-widget mb-4">
                <h2 class="custom-heading-2">Newsletter</h2>
                <p>
                    Quer saber mais sobre o clube?
                    Inscreva-se para receber todas essas informações.
                </p>
                <div class="block-23 mb-3">
                    <div id="assgapa-newsletter">
                        <div class="newsletter" id="newsletter">
                            <div class="newsletter_form_container">
                                <form method="post" class="form-outline-style" id="newsletterFooter">
                                    <div class="d-flex flex-row align-items-start justify-content-start">
                                        <input type="email" class="newsletter_input" name="email"
                                            placeholder="Insira seu email" required="required">
                                        <button class="newsletter_button">
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                                <div id="newsletterFooter-message-warning" class="mt-4"></div>
                                <div id="newsletterFooter-message-success">
                                    <p>Assinatura concluída, obrigado!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="ads">
            {{-- Ads Google
            @include('site.partials.adsGoogle')--}}
        </div>

    </div>
  </footer>
