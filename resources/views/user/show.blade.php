@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Show') . " " . __('User') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $user->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellidos }}
                        </div>
                        <div class="form-group">
                        <strong>Nodo:</strong>
                            {{ $user->nodo->nombre }}
                        </div>
                        <div class="form-group">
                        <strong>Estado:</strong>
                            {{ $user->estado->nombre }}
                        </div>
                        <div class="form-group">
                        <strong>Rol:</strong>
                            {{ $user->roles->first()->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
