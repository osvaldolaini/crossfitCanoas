<!-- ======= Modalities Section ======= -->
<section class="custom-section section-modalities jarallax">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="heading-section" data-aos="fade-up" data-aos-delay="100">
                    <span>Modalidades</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-3 card-modalities" data-aos="fade-up">
                <a class="modalities-item" href="{{ url('modalidades#crossfit') }}" data-toggle="tooltip"
                    title="CrossFit">
                    <div class="title">
                        CrossFit
                    </div>
                    <div class="image">
                        <picture>
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit.jpg') }}"
                                class="lazyload ">
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit.webp') }}"
                                class="lazyload ">
                            <img class="img-fluid" data-src="{{ url('storage/images/site/canoas-crossfit.webp') }}"
                                alt="{!! $config->meta_tags !!}-crossfit" class="lazyload ">
                        </picture>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-3 card-modalities" data-aos="fade-up" data-aos-delay="200">
                <a class="modalities-item" href="{{ url('modalidades#lpo') }}" data-toggle="tooltip"
                    title="Levantamento de peso">
                    <div class="title">
                        Levantamento de peso
                    </div>
                    <div class="image">
                        <picture>
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-lpo.jpg') }}"
                                class="lazyload ">
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-lpo.webp') }}"
                                class="lazyload ">
                            <img class="img-fluid"
                                data-src="{{ url('storage/images/site/canoas-crossfit-lpo.webp') }}"
                                alt="{!! $config->meta_tags !!}-levantamento-de-peso" class="lazyload ">
                        </picture>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-3 card-modalities" data-aos="fade-up" data-aos-delay="400">
                <a class="modalities-item" href="{{ url('modalidades#gym') }}" data-toggle="tooltip"
                    title="Movimentos Ginásticos">
                    <div class="title">
                        Movimentos Ginásticos
                    </div>
                    <div class="image">
                        <picture>
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-ginastica.jpg') }}"
                                class="lazyload ">
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-ginastica.webp') }}"
                                class="lazyload ">
                            <img class="img-fluid"
                                data-src="{{ url('storage/images/site/canoas-crossfit-ginastica.webp') }}"
                                alt="{!! $config->meta_tags !!}-ginastica" class="lazyload ">
                        </picture>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-3 card-modalities" data-aos="fade-up" data-aos-delay="600">
                <a class="modalities-item" href="{{ url('modalidades#mobilidade') }}" data-toggle="tooltip"
                    title="Mobilidades">
                    <div class="title">
                        Mobilidades
                    </div>
                    <div class="image">
                        <picture>
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-mobilidade.jpg') }}"
                                class="lazyload ">
                            <source data-srcset="{{ url('storage/images/site/canoas-crossfit-mobilidade.webp') }}"
                                class="lazyload ">
                            <img class="img-fluid"
                                data-src="{{ url('storage/images/site/canoas-crossfit-mobilidade.webp') }}"
                                alt="{!! $config->meta_tags !!}-mobilidade" class="lazyload ">
                        </picture>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
