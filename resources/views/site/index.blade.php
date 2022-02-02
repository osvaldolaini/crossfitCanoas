@extends('site.app')
@section('body')
<div class="wrapper jarallax" >
<section class="custom-section jumbotron-section jarallax">
    <div class="container ">
        <div class="row">
            <div class="col">
                <h1 class="d-none d-md-flex">
                    <span data-aos="fade-right" data-aos-delay="600">
                        DANDO MAIS DIAS A SUA VIDA E
                    </span>
                    <span data-aos="fade-left" data-aos-delay="800">
                        MAIS VIDA AOS SEUS DIAS
                    </span> 
                </h1>
                <h1 class="d-sm-block d-md-none">
                    <span data-aos="fade-right" data-aos-delay="600">
                        DANDO MAIS DIAS A SUA VIDA E
                    </span>
                    <span data-aos="fade-left" data-aos-delay="800">
                        MAIS VIDA AOS SEUS DIAS
                    </span> 
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="custom-section crossfit-section" id="crossfit" style="background-color: rgba(0, 0, 0, 0.85);">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="heading-section" data-aos="fade-up" data-aos-delay="300">
                    O que é <span>Crossfit?</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-section">
                <p>
                    O CrossFit é um treinamento de condicionamento físico onde trabalhamos movimentos funcionais, constantemente variados e em alta intensidade.
                </p>
                <p>
                    Nos movimentos funcionais buscamos trabalhar o corpo como um todo visando maior eficiência dos nossos movimentos.
                </p>
                <p>
                    Estes movimentos são constantemente variados pois cada dia trabalhamos com estímulos diferentes, variando cargas, repetições, tempo e demais elementos do nosso programa. Buscamos proporcionar um condicionamento amplo e inclusivo, nos preparando melhor para o nosso dia a dia.
                </p>
                <p>
                    Na alta intensidade é onde temos um ganho efetivo e conseguimos melhorar o limite da tolerância física e psicológica de cada pessoa, sempre adaptando às restrições e condições de cada aluno.
                </p>
                <p>
                    Nosso objetivo é proporcionar melhor seu condicionamento físico, agregando saúde e qualidade de vida!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="button crossfit_button"><a href="{{url('o-que-e-crossfit')}}">Saiba mais</a></div>
            </div>
        </div>
    </div>
</section>

</div>
    {{-- Services --}}
    @include('site.sections.services')
    {{-- Modalities --}}
    @include('site.sections.modalities')
    {{-- Time table --}}
    @include('site.sections.timetable')
    {{-- Newsletter --}}
    @include('site.sections.contact')
    {{-- Newsletter --}}
    @include('site.sections.newsletter')
    {{-- Articles --}}
    @include('site.sections.articles')
    
@stop
