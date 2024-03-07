@extends('layouts.app')

@section('template_title')
    {{ $datosUnicosPorSolicitude->name ?? "{{ __('Show') Datos Unicos Por Solicitude" }}
@endsection

@section('content')

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
                            <strong>Tipo De Dato:</strong>
                            {{ $datosUnicosPorSolicitude->tiposDeDato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo De Solicitud:</strong>
                            {{ $datosUnicosPorSolicitude->tiposDeSolicitude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $datosUnicosPorSolicitude->estado->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
