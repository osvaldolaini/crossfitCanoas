@extends('adminlte::page')

@section('title_postfix', '| Dashboard')
{{-- Graficos --}}
@section('plugins.App_charts', true)

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Acesso por categorias
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div id="third"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">
                                        <i class="fas fa-star mr-1"></i>
                                        Top 5
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            @if ($pages)
                                                @foreach ($pages as $page)
                                                    <li class="item">
                                                        <div class="product-img pr-2">
                                                            <h2>
                                                                {{ $page['pos'] }}
                                                                <i class="fas fa-crown text-warning"></i>
                                                            </h2>
                                                        </div>
                                                        <div class="product-info">
                                                            <span class="badge badge-primary ">{{ $page['qtd'] }} acessos
                                                                <i class="fa fa-lg fa-fw fa-eye"></i></span>
                                                            <a href="{{ url($page['link']) }}"
                                                                class="product-title">{{ $page['category'] }}</a>

                                                            <span class="product-description">
                                                                {{ $page['page'] }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            @endif

                                            <!-- /.item -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
