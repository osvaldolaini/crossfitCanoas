    <main id="main" >
        <!-- Preloader -->
            <div id="preloader" class="preloader">
                <picture class="lazyload img-fluid">
                    <source srcset="{{url('storage/images/site/logo.png')}}" />
                    <source srcset="{{url('storage/images/site/logo.webp')}}"/>
                    <img class="lazyload img-fluid" src="{{url('storage/images/site/logo.png')}}" id="preloader-fixo"/>
                </picture>
            </div>
            <div class="preloader-background visible opening">
                <div class="bg-layer" ></div>
            </div><!-- Ink Transition -->
        <!-- End Preloader -->
        <div class="cd-transition-layer ">
            <div class="bg-layer" ></div>
        </div>
    </main> 
    <!-- LARGE NAVBAR nav -->
    <nav class="navbar navbar-expand-md fixed-top d-none d-lg-block mt-0 pt-0" id="custom-nav">
        <div class="collapse navbar-collapse mt-0 pt-0 d-none d-lg-block">
              <div class="navbar-nav " id="main-nav">
                  <li class="has-children">
                    <a href="{{url('')}}" class="nav-link {{ Request::is('') ? 'active' : null }}">HOME</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('sobre')}}" class="nav-link {{ Request::is('sobre*') ? 'active' : null }}">SOBRE</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('nossos-numeros')}}" class="nav-link {{ Request::is('nossos-numeros*') ? 'active' : null }}">ESTATISTICAS</a>
                  </li>
                  <div class="logo_container text-center">
                    <div class="trans_500">
                        <a href="{{url('')}}" class="logo">
                        <picture class="lazyload img-fluid">
                            <source srcset="{{url('storage/images/logos/logo.png')}}" />
                            <source srcset="{{url('storage/images/logos/logo.webp')}}"/>
                            <img class="lazyload img-fluid" src="{{url('storage/images/logos/logo.png')}}" />
                        </picture>
                        </a>
                    </div>
                  </div>
                  <li class="has-children">
                    <a href="{{url('elenco')}}" class="nav-link {{ Request::is('elenco*') ? 'active' : null }}">ELENCO</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('noticias')}}" class="nav-link {{ Request::is('noticias*') ? 'active' : null }}">NOTÍCIAS</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('fale-conosco')}}" class="nav-link {{ Request::is('fale-conosco*') ? 'active' : null }}">CONTATO</a>
                  </li>
              </div>
          </div>
    </nav>
    <!-- SMALL NAVBAR nav -->
    <nav class="navbar navbar-expand-lg fixed-top d-lg-none navbar-dark custom_navbar bg-dark nav-custom nav-custom-small" id="custom-nav">
        <a class="nav-logo" href="#" >
            <picture class="lazyload img-fluid">
                <source srcset="{{url('storage/images/logos/logo.png')}}" />
                <source srcset="{{url('storage/images/logos/logo.webp')}}"/>
                <img class="lazyload img-fluid" src="{{url('storage/images/logos/logo.png')}}" />
            </picture>
        </a>
        <a class="nav-icon navbar-toggler " id="cd-modal-trigger">
            <i class="fa fa-2x fa-bars"></i>
        </a>
    </nav>
    <div class="cd-modal">
        <div class="modal-content">
            <div class="full-menu">
                <nav class="navbar navbar-expand-lg fixed-top d-lg-none navbar-dark custom_navbar nav-custom nav-custom-small" id="custom-nav">
                    <a class="nav-logo" href="#" >
                        <picture class="lazyload img-fluid">
                            <source srcset="{{url('storage/images/logos/logo.png')}}" />
                            <source srcset="{{url('storage/images/logos/logo.webp')}}"/>
                            <img class="lazyload img-fluid" src="{{url('storage/images/logos/logo.png')}}" />
                        </picture>
                    </a>
                    <a class="nav-icon nav-toggler" id="modal-close">
                        <i class="fas fa-3x fa-times nav-toggler-icon"></i>
                    </a>
                </nav>
                <div class="fullmenu-content">
                    <ul class="page-menu">
                        <li><a class="{{ Request::is('home*') ? 'active' : null }}" href="{{url('')}}">Home</a></li>
                        <li><a class="{{ Request::is('sobre*') ? 'active' : null }}" href="{{url('sobre')}}">Sobre</a></li>
                        <li><a class="{{ Request::is('elenco*') ? 'active' : null }}" href="{{url('elenco')}}">Elenco</a></li>
                        <li><a class="{{ Request::is('nossos-numeros*') ? 'active' : null }}" href="{{url('nossos-numeros')}}">Estatisticas</a></li>
                        <li><a class="{{ Request::is('noticias*') ? 'active' : null }}" href="{{url('noticias')}}">Notícias</a></li>
                        <li><a class="{{ Request::is('fale-conosco*') ? 'active' : null }}" href="{{url('fale-conosco')}}">Contatos</a></li>
                        <li class="social">
                            @if (isset($menu['socialMedias']))
                                @foreach ($menu['socialMedias'] as $socialMedia)
                                        <a href="{{$socialMedia->link}}" target="_blank">
                                            <i class="fab fa-fw {{$socialMedia->icon}}"></i>
                                        </a>
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- .modal-content -->
    </div> <!-- .cd-modal -->
