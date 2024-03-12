@extends('layouts.app')

@section('template_title')
    {{ $datosPorSolicitud->name ?? "('Show') Datos Por Solicitud" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Datos Por Solicitud</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('datos-por-solicituds.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Solicitudes:</strong>
                            {{ $datosPorSolicitud->id_solicitudes }}
                        </div>
                        <div class="form-group">
                            <strong>Id Datos Unicos Por Solicitudes:</strong>
                            {{ $datosPorSolicitud->id_datos_unicos_por_solicitudes }}
                        </div>
                        <div class="form-group">
                            <strong>Dato:</strong>
                            {{ $datosPorSolicitud->dato }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
