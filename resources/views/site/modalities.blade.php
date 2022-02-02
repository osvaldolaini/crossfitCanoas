@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')
    <!-- ======= Modalities Section ======= -->
    <section class="custom-section page-modalities">
        <div class="container">
            <div class="row no-gutters modalities" >
                <div class="col-md-12 modalities-wrap" id="gym">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 img"
                            style="background-image: url({{ url('storage/images/site/canoas-crossfit-ginastica.jpg') }}); height: 667px;"
                            data-aos="fade-right"></div>
                        <div class="col-md-7">
                            <div class="text pt-5 pl-0 pl-lg-5 pl-md-4 " data-aos="fade-up">
                                <div class="px-4 px-lg-4">
                                    <div class="desc">
                                        <div class="top">
                                            <span class="subheading">GYMNASTICS</span>
                                        </div>
                                        <div class="absolute">
                                            <p class="mb-3 text-preto">O treino de gymnastics visa desenvolver as mais
                                                variadas habilidades como agilidade, coordenação, equilíbrio, entre outras.
                                            </p>
                                            <p class="mb-3 text-preto">
                                                O Treino:
                                                Nosso foco será o fortalecimento do core e movimentos
                                                acessórios/complementares que venham melhorar a execução de determinado
                                                movimento ou deem suporte para que o aluno consiga realizar o exercício.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 modalities-wrap" id="crossfit">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 order-md-last img"
                            style="background-image: url({{ url('storage/images/site/canoas-crossfit.jpg') }}); height: 667px;"
                            data-aos="fade-left">
                        </div>
                        <div class="col-md-7">
                            <div class="text pt-5 pr-md-5" data-aos="fade-up">
                                <div class="px-4 px-lg-4">
                                    <div class="desc text-md-right">
                                        <div class="top">
                                            <span class="subheading">CROSSFIT</span>
                                        </div>
                                        <div class="absolute">
                                            <p class="mb-3 text-preto">O CrossFit é simplesmente o esporte que mais cresce
                                                no mundo. Praticado por militares, atletas, celebridades e até pessoas que
                                                acabaram de sair do sedentarismo, o CrossFit é um esporte encantador e
                                                viciante, que proporciona ótimos resultados a saúde e a beleza de pessoas de
                                                todos os biotipos e idades. Tudo isso com treinos intensos e variados , mas
                                                que não deixam de ser divertidos.</p>
                                            <p class="mb-3 text-preto">O CrossFit é um treino de condicionamento físico onde
                                                se trabalha movimentos funcionais, constantemente variados em alta
                                                intensidade. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 modalities-wrap" id="lpo">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 img "
                            style="background-image: url({{ url('storage/images/site/canoas-crossfit-lpo.jpg') }}); height: 667px;"
                            data-aos="fade-right"></div>
                        <div class="col-md-7">
                            <div class="text pt-5 pl-md-5 pl-md-4 " data-aos="fade-up">
                                <div class="px-4 px-lg-4">
                                    <div class="desc">
                                        <div class="top">
                                            <span class="subheading">WEIGHTLIFTING</span>

                                        </div>
                                        <div class="absolute">
                                            <p class="mb-3 text-preto">O weightlifting é constituído por um conjunto de
                                                exercícios de levantamento de peso que buscam o desenvolvimento de
                                                habilidades essenciais para o condicionamento físico e fitness em geral,
                                                como força, explosão muscular, flexibilidade, coordenação e equilíbrio.</p>
                                            <p class="mb-3 text-preto">O Treino:
                                                Nosso principal objetivo será melhorar a técnica dos movimentos de
                                                Levantamento de Peso Olímpico (Clean and Jerk e Snacth) trabalhando com
                                                movimentos acessórios/complementares e força.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 modalities-wrap" id="mobilidade">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 order-md-last img"
                            style="background-image: url({{ url('storage/images/site/canoas-crossfit-mobilidade.jpg') }}); height: 667px;"
                            data-aos="fade-left"></div>
                        <div class="col-md-7">
                            <div class="text pt-5 pr-md-5" data-aos="fade-up">
                                <div class="px-4 px-lg-4">
                                    <div class="desc text-md-right">
                                        <div class="top">
                                            <span class="subheading">MOBILITY</span>
                                        </div>
                                        <div class="absolute">
                                            <p class="mb-3 text-preto">A mobilidade pode ser considerada uma das habilidades
                                                mais importantes em um treino de CrossFit, uma vez que uma boa mobilidade
                                                permite a execução de movimentos complexos com mais facilidade, além de ser
                                                fundamental na prevenção de lesões.</p>
                                            <p class="mb-3 text-preto">
                                                O Treino:
                                                Durante o treino de Mobility são realizadas várias séries de movimentos que
                                                visam a melhora da flexibilidade e amplitude de movimento de várias partes
                                                do corpo como lombar, quadril, pernas, tornozelo e praticamente qualquer
                                                outra parte que possa estar rígida e limitar sua capacidade de movimentação.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
    @include('site.sections.newsletter')
    {{-- Articles --}}
    @include('site.sections.articles')

@stop
