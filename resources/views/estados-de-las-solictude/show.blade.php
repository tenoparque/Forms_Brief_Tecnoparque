@extends('layouts.app')

@section('template_title')
    {{ $estadosDeLasSolictude->name ?? " __('Show') Estados De Las Solictude" }}
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
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('DETALLES DEL ESTADO ') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style = "font-size: 180%">{{ __('DE LA SOLICITUD') }}</h1>
                                </div>
                            </div>

                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estados-de-las-solictudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadosDeLasSolictude->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $estadosDeLasSolictude->id_estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
