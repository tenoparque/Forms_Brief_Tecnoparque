@extends('layouts.app')

@section('template_title')
    {{ $categoriasEventosEspeciale->name ?? "{{ __('Show') Categorias Eventos Especiale" }}
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
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('DETALLE') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('CATEGORIA EVENTOS ESPECIALES') }}</h1>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias-eventos-especiales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriasEventosEspeciale->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $categoriasEventosEspeciale->id_estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
