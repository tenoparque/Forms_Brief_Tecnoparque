@extends('layouts.app')

@section('template_title')
    {{ $serviciosPorTiposDeSolicitude->name ?? " __('Show') Servicios Por Tipos De Solicitude" }}
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
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('DETALLES DE EL') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('SERVICIO POR TIPO DE SOLICITUD') }}</h1>
                                </div>
                            </div>


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
                            {{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $serviciosPorTiposDeSolicitude->estado->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
