    <!-- ======= Counter Section ======= -->
    <section class="counter-section bg-counter jarallax" style="background-image:url({{ url('storage/images/site/milestones.jpg') }});" id="counter">
        <div class="container">
            <div class="row pt-5" id="milestones_row" >
                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-start justify-content-start">
                        <div class="milestone_icon">
                            <img class="lazyload" src="{{ url('storage/images/site/icon_1.svg') }}"
                                alt="{{$config->nick}}-freepik_1">
                        </div>
                        <div class="milestone_content">
                            <div class="milestone_counter number" id="jogadores" data-number="{{$players}}">0</div>
                            <div class="milestone_title">Jogadores</div>
                            <div class="milestone_subtitle">Nosso elenco é 10</div>
                        </div>
                    </div>
                </div>
                <!-- Milestone -->
                <div class="col-lg-3 col-md-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-start justify-content-start">
                        <div class="milestone_icon">
                            <img class="lazyload" src="{{ url('storage/images/site/icon_2.svg') }}"
                                alt="{{$config->nick}}-freepik_2">
                        </div>
                        <div class="milestone_content">
                            <div class="milestone_counter number" id="jogos" data-number="{{$matches}}">0</div>
                            <div class="milestone_title">Jogos</div>
                            <div class="milestone_subtitle">Temporada <?= date('Y') ?></div>
                        </div>
                    </div>
                </div>
                <!-- Milestone -->
                <div class="col-lg-3 col-sm-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-start justify-content-start lazyload">
                        <div class="milestone_icon">
                            <img class="lazyload" src="{{ url('storage/images/site/icon_3.svg') }}"
                                alt="{{$config->nick}}-freepik_3">
                        </div>
                        <div class="milestone_content">
                            <div class="milestone_counter number" id="vitorias" data-number="{{$wins}}">0</div>
                            <div class="milestone_title">Vitórias</div>
                            <div class="milestone_subtitle">Total de vitórias em <?= date('Y') ?></div>
                        </div>
                    </div>
                </div>
                <!-- Milestone -->
                <div class="col-lg-3 col-sm-6 milestone_col">
                    <div class="milestone d-flex flex-row align-items-start justify-content-start">
                        <div class="milestone_icon">
                            <img class="lazyload" src="{{ url('storage/images/site/icon_4.svg') }}"
                                alt="{{$config->nick}}-freepik_4">
                        </div>
                        <div class="milestone_content">
                            <div class="milestone_counter number" id="gols" data-number="{{$gols}}">0</div>
                            <div class="milestone_title">Gols</div>
                            <div class="milestone_subtitle">Artilharia pesada</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>