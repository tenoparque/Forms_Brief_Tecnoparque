@extends('layouts.app')

@section('template_title')
    {{ $personalizacione->name ?? " __('Show') Personalizacione" }}
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
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('DETALLES') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE PERSONALIZACIÓN') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personalizaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Logo:</strong>
                            <img src="data:image/png;base64,{{ base64_encode($personalizacione->logo) }}" alt="LOGO">
                        </div>
                        <div class="form-group">
                            <strong>Color Principal:</strong>
                            {{ $personalizacione->color_principal }}
                        </div>
                        <div class="form-group">
                            <strong>Color Secundario:</strong>
                            {{ $personalizacione->color_secundario }}
                        </div>
                        <div class="form-group">
                            <strong>Color Terciario:</strong>
                            {{ $personalizacione->color_terciario }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $personalizacione->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $personalizacione->estado->nombre}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
