@extends('layouts.app')

@section('template_title')
    {{ $personalizacione->name ?? "{{ __('Show') Personalizacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Personalizacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personalizaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $personalizacione->logo }}
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
                            <strong>Id Users:</strong>
                            {{ $personalizacione->id_users }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $personalizacione->id_estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
