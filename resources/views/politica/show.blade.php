@extends('layouts.app')

@section('template_title')
    {{ $politica->name ?? "{{ __('Show') Politica" }}
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
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE LAS POLÍTICAS') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('politicas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Link:</strong>
                            {{ $politica->link }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $politica->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Qr:</strong>
                            {{ $politica->qr }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $politica->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $politica->id_estado }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $politica->titulo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
