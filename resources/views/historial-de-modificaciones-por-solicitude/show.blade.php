@extends('layouts.app')

@section('template_title')
    {{ $historialDeModificacionesPorSolicitude->name ?? "{{ __('Show') Historial De Modificaciones Por Solicitude" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Historial De Modificaciones Por Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-de-modificaciones-por-solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Soli:</strong>
                            {{ $historialDeModificacionesPorSolicitude->id_soli }}
                        </div>
                        <div class="form-group">
                            <strong>Modificacion:</strong>
                            {{ $historialDeModificacionesPorSolicitude->modificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Modificacion:</strong>
                            {{ $historialDeModificacionesPorSolicitude->fecha_de_modificacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
