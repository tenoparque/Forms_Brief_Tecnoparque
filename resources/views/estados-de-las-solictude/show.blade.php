@extends('layouts.app')

@section('template_title')
    {{ $estadosDeLasSolictude->name ?? "{{ __('Show') Estados De Las Solictude" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estados De Las Solictude</span>
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
