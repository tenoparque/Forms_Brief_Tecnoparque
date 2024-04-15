@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="flex-container">
        <div class="flex__direction-login">
            <form method="POST" action="{{ route('login') }}" class="form-login">
                @csrf
                <H1 class="titulo__login">Brief</H1>
                <h3 class="subtitulo__login">Plataforma de solicitudes</h3>
                <br>
                <br>
              
                    <div class="flex__directionInput">
                        <input id="email"  placeholder="CORREO" type="email"
                            class="form-control form__inputLogin @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong >{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
              
             
                    <div class="flex__directionInput  inputPassLogin">
                        <input id="password" placeholder="CONTRASEÑA" type="password"
                            class="form-control form__inputLogin  @error('password')  is-invalid @enderror" name="password" required
                            autocomplete="current-password" style="width: 80%;
                            margin: 0px;
                            padding: 11px;
                            border-radius: 12px;
                            border-width:4px;
                            border-style: solid;
                            border-color: #ececec;
                            background-color:  #ececec;
                            box-shadow: inset 0 0 5px rgb(0,0,0,.4);
                            border:none;
                            outline: none;
                            color: #000;
                            font-size: 14px;
                            padding-left: 3%;"
                            >
                        <span class="eye-icon" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
              
                <div class="forgot">
                    <a href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
                <div>
                    <div>
                        <button type="submit" class="button-login">
                            {{ __('ENTRAR') }}
                        </button>
                    </div>
                </div>
                <div class="img-login">
                    <div class="img__container-login">
                        <div>
                            <img src="../images/RedTecno.png" alt="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
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
            if (activeLink) {
                $('a[href="' + activeLink + '"]').addClass('active-link');
            }
        });
    </script>
<script></script>
@endsection
