@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="container-fluid" style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; min-height: 100vh; margin-block-start: -190px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="flex-container" style="margin-block-start: 200px">
                
                    <form method="POST" class="form__emailPass" action="{{ route('password.email') }}">
                        <div class="card-header  titlerestablecer">{{ __('Restablecer contraseña') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                    <input style="margin-block-start: -10px" placeholder="Correo electrónico" id="email" type="email" class="form-control @error('email')  is-invalid @enderror form_inputResetPass" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>    
                            </div>
                        </div>

                        <div class="row justify-content-center"> <!-- Contenedor flex para centrar los elementos horizontalmente -->
                            <div class="col-md-10"> <!-- Columna con ancho específico -->
                                <button type="submit" class="btnEmail">Enviar link de restablecimiento</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-img">
                        <div class="img-container">
                             <div>
                                 <img src="../images/recursos/mail-icon.webp" alt="">
                             </div>
                        </div>
                     </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
