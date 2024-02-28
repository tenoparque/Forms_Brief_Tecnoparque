@extends('layouts.app')

@section('template_title')
    {{ $eventosEspecialesPorCategoria->name ?? "{{ __('Show') Eventos Especiales Por Categoria" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Eventos Especiales Por Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('eventos-especiales-por-categorias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $eventosEspecialesPorCategoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $eventosEspecialesPorCategoria->id_estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Eventos Especiales:</strong>
                            {{ $eventosEspecialesPorCategoria->id_eventos_especiales }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
