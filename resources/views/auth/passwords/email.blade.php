@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class=""
        style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; min-height: 100vh; margin-block-start: -190px">
        <div class="line__email-pass">
            <div class="flex-direction">


                <form class="form-resetPass" method="POST" action="{{ route('password.email') }}">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf

                    <div  class="form__section-resetPass">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label style=" font-weight:400;"for="email"class="label__resetPass">{{ __('Correo electrónico') }}</label>
                        <input  placeholder="Correo electrónico" id="email"
                            type="email"class="form-control @error('email')   is-invalid @enderror form_inputResetPass"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    </div>
                    <div class="form__section-resetPass">
                        <button type="submit" class="btnEmail">Enviar link de restablecimiento
                            <i class="fa-solid fa-user-shield fa-lg" style="color: #642c78; margin:5px"></i>
                        </button>
                    </div>

                </form>
                <div class="form__img-resetPass">
                    <div class="img__container-resetPass">
                        <div>
                            <img src="
                            
                            
                            
                            /images/recursos/email_green.png" alt="">
                        </div>
                    </div>
                    <div style="margin-block-start: 7px;text-align: center;color: #00324D" class="title__form-resetPass">{{ __('Restablecer contraseña') }}
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
