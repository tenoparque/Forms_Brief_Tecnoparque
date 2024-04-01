@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="container-fluid" style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; height: 100vh; margin-block-start: -190px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card email" style="margin-block-start: 200px">
                <div class="card-header">{{ __('Restablecer contraseña') }}</div>

                <div class="card-body-email">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="form-group" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center"> <!-- Contenedor flex para centrar los elementos horizontalmente -->
                            <div class="col-md-10"> <!-- Columna con ancho específico -->
                                <label style="margin-block-start: 20px" for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center"> <!-- Contenedor flex para centrar los elementos horizontalmente -->
                            <div class="col-md-10"> <!-- Columna con ancho específico -->
                                <div class="txtEma">
                                    <input style="margin-block-start: -10px" placeholder="Correo electrónico" id="email" type="email" class="form-control @error('email')  is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>    
                            </div>
                        </div>

                        <div class="row justify-content-center"> <!-- Contenedor flex para centrar los elementos horizontalmente -->
                            <div class="col-md-10"> <!-- Columna con ancho específico -->
                                <button type="submit" class="btnEmail">Enviar link de restablecimiento</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
