@extends('layouts.app')

@section('template_title')
    {{ $datosUnicosPorSolicitude->name ?? "{{ __('Show') Datos Unicos Por Solicitude" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Datos Unicos Por Solicitude</span>
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
