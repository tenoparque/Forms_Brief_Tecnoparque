@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .card_login {
            background-color: {{ $colorPrincipal }};
            border-radius: 20px;
            width: 86%;
            margin-left: 8%;
            height: 80%;
            padding: 4%;
            padding-top: 14%;
            margin-block-start: 17%;
            text-align: center;
            justify-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            transition: 0.3s;
            display: flex;
        }

        .titulo {
            text-align: center;
            font-family: "Work Sans", sans-serif;
            font-weight: 800;
            font-size: 720%;
            color: #ffffff;

        }



        .subtitulo {
            color: {{ $colorTerciario }};
            text-align: center;
            font-size: 170%;
            font-weight: 300;
        }

        .btn-primary {
            background-color: {{$colorSecundario}};
            border: none;
            color: white;
            width: 50%;
            border-radius: 15px;
            padding: 3% 10%;
            margin-bottom: 18%;
            cursor: pointer;
        }

        .btn-primary:hover {
            opacity: 80%;
            background-color: {{$colorTerciario}};
            
        }


        .eye-icon {
            cursor: pointer;
            margin-left: -30px;
            z-index: 1;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 40%">

                <div class="card_login">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <H1 class="titulo">Brief</H1>
                            <h3 class="subtitulo">Plataforma de solicitudes</h3>
                            <br>
                            <br>
                            <div class="row mb-3 ">
                                <div class="col-md-9 ">
                                    <input style="margin-left: 21%; width: 100%; " id="email" placeholder="CORREO"
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
                                <div class="col-md-9 d-flex align-items-center" style="margin-left: 11%">
                                    <input style="margin-left: 5.3%; margin-block-start: 4%" id="password"
                                        placeholder="CONTRASEÑA" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <span style="margin-block-start: 4%" class="eye-icon"
                                        onclick="togglePasswordVisibility()">
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
                                    {{ __('¿ Olvidaste tu contraseña?') }}
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
@endsection
