@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')

    
<section class="custom-section crossfit-section" >
    <div class="container"> 
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
    </div>
</section>
    {{-- Services --}}
    @include('site.sections.services')
    {{-- Newsletter --}}
    @include('site.sections.newsletter')
    {{-- Articles --}}
    @include('site.sections.articles')

@stop
