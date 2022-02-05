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
                    <a href="{{url('o-que-e-crossfit')}}" class="nav-link {{ Request::is('crossfit*') ? 'active' : null }}">CROSSFIT</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('como-comecar')}}" class="nav-link {{ Request::is('como-comecar*') ? 'active' : null }}">COMO COMEÇAR</a>
                  </li>
                  <div class="logo_container text-center">
                    <div >
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
                    <a href="{{url('horarios')}}" class="nav-link {{ Request::is('horarios*') ? 'active' : null }}">HORÁRIOS</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('youtube')}}" class="nav-link {{ Request::is('youtube*') ? 'active' : null }}">NOSSOS VÍDEOS</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('artigos')}}" class="nav-link {{ Request::is('artigos*') ? 'active' : null }}">ARTIGOS</a>
                  </li>
                  <li class="has-children">
                    <a href="{{url('fale-conosco')}}" class="nav-link {{ Request::is('fale-conosco*') ? 'active' : null }}">CONTATO</a>
                  </li>
              </div>
          </div>
    </nav>
    <!-- SMALL NAVBAR nav -->
    <nav class="navbar navbar-expand-lg fixed-top d-lg-none custom_navbar nav-custom nav-custom-small" id="custom-nav">
        <a class="nav-logo" href="#" >
            <picture class="lazyload img-fluid">
                <source srcset="{{url('storage/images/logos/logo.png')}}" />
                <source srcset="{{url('storage/images/logos/logo.webp')}}"/>
                <img class="lazyload img-fluid" src="{{url('storage/images/logos/logo.png')}}" />
            </picture>
        </a> 
        <a class="nav-icon navbar-toggler " id="cd-modal-trigger">
            <i class="fa fa-3x fa-bars"></i>
        </a>
    </nav>
    <div class="cd-modal">
        <div class="modal-content"> 
            <div class="full-menu">
                <nav class="navbar navbar-expand-lg fixed-top d-lg-none custom_navbar nav-custom nav-custom-small" id="custom-nav">
                    <a class="nav-logo" href="#" >
                        <picture class="lazyload img-fluid">
                            <source srcset="{{url('storage/images/logos/logo.png')}}" />
                            <source srcset="{{url('storage/images/logos/logo.webp')}}"/>
                            <img class="lazyload img-fluid" src="{{url('storage/images/logos/logo.png')}}" />
                        </picture>
                    </a>
                    <a class="nav-icon navbar-toggler-open" id="modal-close">
                        <i class="fas fa-3x fa-times"></i>
                    </a>
                </nav>
                <div class="fullmenu-content">
                    <ul class="page-menu">
                        <li><a href="{{url('')}}" class="nav-link {{ Request::is('') ? 'active' : null }}">HOME</a></li>
                        <li><a href="{{url('sobre')}}" class="nav-link {{ Request::is('sobre*') ? 'active' : null }}">SOBRE</a></li>
                        <li><a href="{{url('o-que-e-crossfit')}}" class="nav-link {{ Request::is('crossfit*') ? 'active' : null }}">CROSSFIT</a></li>
                        <li><a href="{{url('como-comecar')}}" class="nav-link {{ Request::is('como-comecar*') ? 'active' : null }}">COMO COMEÇAR</a></li>
                        <li><a href="{{url('youtube')}}" class="nav-link {{ Request::is('youtube*') ? 'active' : null }}">NOSSOS VÍDEOS</a></li>
                        <li><a href="{{url('horarios')}}" class="nav-link {{ Request::is('horarios*') ? 'active' : null }}">HORÁRIOS</a></li>
                        <li><a href="{{url('artigos')}}" class="nav-link {{ Request::is('artigos*') ? 'active' : null }}">ARTIGOS</a></li>
                        <li><a href="{{url('fale-conosco')}}" class="nav-link {{ Request::is('fale-conosco*') ? 'active' : null }}">CONTATO</a></li>
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
