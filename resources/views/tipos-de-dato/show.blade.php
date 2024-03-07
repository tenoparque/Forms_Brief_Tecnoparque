@extends('layouts.app')

@section('template_title')
    {{ $tiposDeDato->name ?? "__('Show') Tipos De Dato" }}
@endsection

@section('content')
    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipos De Dato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipos-de-datos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tiposDeDato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tiposDeDato->estado->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
