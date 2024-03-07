@extends('layouts.app')

@section('template_title')
    {{ $eventosEspecialesPorCategoria->name ?? " __('Show') Eventos Especiales Por Categoria" }}
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
                                    <h1 class="primeraPalabraFlex" style="font-size:180%">{{ __('DETALLE DEL EVENTO') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('ESPECIAL POR CATEGORIA') }}</h1>
                                </div>
                            </div>
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
                            <strong>Estado:</strong>
                            {{ $eventosEspecialesPorCategoria->estado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Evento Especial:</strong>
                            {{ $eventosEspecialesPorCategoria->categoriasEventosEspeciale->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
