@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 40%">

                <div class="card_login">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" style="min-width: 400px">
                            @csrf
                            <H1 class="titulo">Brief</H1>
                            <h3 class="subtitulo">Plataforma de solicitudes</h3>
                            <br>
                            <br>
                            <div class="mb-3 " style="padding: 10px 0">
                                <div class="col-md-9 ">
                                    <input id="email" placeholder="CORREO"
                                        type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-9 position-relative">
                                    <input  id="password" placeholder="CONTRASEÑA" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <span style="position: absolute; top: 50%;right: -18%; transform: translateY(-50%);" class="eye-icon" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                            <div class="forgot">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="white-space: nowrap;">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ENTRAR') }}
                                    </button>
                                </div>
                            </div>
                            <div class="div_logo">
                                <img class="logo" src="../images/RedTecno.png" alt="">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>$(document).ready(function() {
        $('.eye-icon').click(function() {
            const passwordInput = $('#password');
            const eyeIcon = $('.eye-icon i');
    
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    
        // Guarda el href del enlace en localStorage cuando se hace clic
        $(".sidebar-nav .sidebar-item .sidebar-link").click(function() {
            localStorage.setItem('activeLink', $(this).attr('href'));
        });
    
        // Obtiene el href del enlace activo de localStorage cuando la página se carga
        var activeLink = localStorage.getItem('activeLink');
    
        // Si hay un enlace activo guardado, agrega la clase 'active-link' al enlace activo
        if(activeLink) {
            $('a[href="' + activeLink + '"]').addClass('active-link');
        }
    });</script>
@endsection
