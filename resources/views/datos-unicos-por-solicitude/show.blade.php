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
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">
                                        {{ __('DATOS UNICOS POR SOLICITUD') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('datos-unicos-por-solicitudes.index') }}" class="btn btn-outline"
                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; margin-left: 90%;"
                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                onmouseout="this.style.backgroundColor='#FFFF';">
                                {{ __('REGRESAR') }}
                                <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
                            </a>
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
