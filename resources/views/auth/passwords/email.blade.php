@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class=""
        style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; min-height: 100vh; margin-block-start: -190px">
        <div class="line__email-pass">
            <div class="flex-direction">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="form-resetPass">
                    @csrf

                    <div class="form__section-resetPass">
                        <label for="email" class="label__resetPass col-form-label">{{ __('Correo electrónico') }}</label>
                        <input id="email" type="email"
                            class="form-control @error('email')   is-invalid @enderror form_inputResetPass" name="email"
                            placeholder="Correo electrónico" value="{{ old('email', $email ?? '') }}" required autocomplete="email"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback"  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form__section-resetPass">
                        <button type="submit" class="btnEmail"> {{ __('Enviar link de restablecimiento') }}
                            <i class="fa-solid fa-user-shield fa-lg" style="color: #642c78; margin:5px"></i>
                        </button>
                    </div>
                </form>

                <div class="form__img-resetPass">
                    <div class="img__container-resetPass">
                        <div>
                            <img src="/images/recursos/email_green.png" alt="">
                        </div>
                    </div>
                    <div class="title__form-resetPass">
                        {{ __('Restablecer contraseña') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
