@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? " __('Show') Solicitude" }}
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
                            {{ $solicitude->tiposdesolicitude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Y Hora De La Solicitud:</strong>
                            {{ $solicitude->fecha_y_hora_de_la_solicitud }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario Que Realiza La Solicitud:</strong>
                            {{ $solicitude->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>nodo:</strong>
                            {{ $solicitude->user->nodo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Eventos Especiales Por Categorias:</strong>
                            {{ $solicitude->eventosespecialesporcategoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado De La Solicitud:</strong>
                            {{ $solicitude->estadosDeLasSolictude->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Servicios asociados:</strong>
                            <ul>
                                @foreach ($elementos as $elemento)
                                    <li>{{ $elemento->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5>Datos por solicitud:</h5>
                            @foreach ($datosPorSolicitud as $dato)
                                <div class="form-group">
                                    <label><strong>{{ $dato->titulo }}:</strong></label>
                                    <input type="text" class="form-control" value="{{ $dato->dato }}" readonly>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
