@extends('layouts.app')

@section('template_title')
    {{ $datosUnicosPorSolicitude->name ?? "{{ __('Show') Datos Unicos Por Solicitude" }}
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
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('DETALLE DE') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DATOS UNICOS POR SOLICITUD') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('datos-unicos-por-solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $datosUnicosPorSolicitude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipos De Datos:</strong>
                            {{ $datosUnicosPorSolicitude->id_tipos_de_datos }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipos De Solicitudes:</strong>
                            {{ $datosUnicosPorSolicitude->id_tipos_de_solicitudes }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estados:</strong>
                            {{ $datosUnicosPorSolicitude->id_estados }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
