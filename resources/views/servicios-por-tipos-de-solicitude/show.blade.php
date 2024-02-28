@extends('layouts.app')

@section('template_title')
    {{ $serviciosPorTiposDeSolicitude->name ?? "{{ __('Show') Servicios Por Tipos De Solicitude" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Servicios Por Tipos De Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios-por-tipos-de-solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $serviciosPorTiposDeSolicitude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipo De Solicitud:</strong>
                            {{ $serviciosPorTiposDeSolicitude->id_tipo_de_solicitud }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $serviciosPorTiposDeSolicitude->id_estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
