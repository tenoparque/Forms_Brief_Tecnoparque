@extends('layouts.app')

@section('template_title')
    {{ $nodo->name ?? "{{ __('Show') Nodo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Nodo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('nodos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $nodo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $nodo->id_estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Ciudad:</strong>
                            {{ $nodo->id_ciudad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
