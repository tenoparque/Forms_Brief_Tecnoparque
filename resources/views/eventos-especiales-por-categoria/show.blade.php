@extends('layouts.app')

@section('template_title')
    {{ $eventosEspecialesPorCategoria->name ?? "{{ __('Show') Eventos Especiales Por Categoria" }}
@endsection

@section('content')
<header class="container-fluid mt-5">
        <div class="row d-flex justify-content-between" style="align-items: center; margin-top: 60px">
            <!-- Carta Izquierda -->
            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                <div class="">
                    <div class="text-wel">
                        <h5 class="welcoRe">BIENVENIDO</h5>
                        <div class="d-flex">
                            <h2 class="supereh">SUPER - ‎ </h2>
                            <h2 class="adminreh"> ADMIN</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carta Derecha -->
            <div class="col-sm-8 ">
                <img class="redtecnocol" src="/images/recursos/redtecnocol.png"></img>
            </div>
        </div>

    </header>
    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Eventos Especiales Por Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('eventos-especiales-por-categorias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $eventosEspecialesPorCategoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $eventosEspecialesPorCategoria->id_estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Eventos Especiales:</strong>
                            {{ $eventosEspecialesPorCategoria->id_eventos_especiales }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
