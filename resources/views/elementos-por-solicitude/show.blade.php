@extends('layouts.app')

@section('template_title')
    {{ $elementosPorSolicitude->name ?? __('Show') . " " . __('Elementos Por Solicitude') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Elementos Por Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('elementos-por-solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Solicitudes:</strong>
                            {{ $elementosPorSolicitude->id_solicitudes }}
                        </div>
                        <div class="form-group">
                            <strong>Id Subservicios:</strong>
                            {{ $elementosPorSolicitude->id_subservicios }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
