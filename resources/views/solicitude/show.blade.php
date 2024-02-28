@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? "{{ __('Show') Solicitude" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Tipos De Solicitudes:</strong>
                            {{ $solicitude->id_tipos_de_solicitudes }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Y Hora De La Solicitud:</strong>
                            {{ $solicitude->fecha_y_hora_de_la_solicitud }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario Que Realiza La Solicitud:</strong>
                            {{ $solicitude->id_usuario_que_realiza_la_solicitud }}
                        </div>
                        <div class="form-group">
                            <strong>Id Eventos Especiales Por Categorias:</strong>
                            {{ $solicitude->id_eventos_especiales_por_categorias }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado De La Solicitud:</strong>
                            {{ $solicitude->id_estado_de_la_solicitud }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
