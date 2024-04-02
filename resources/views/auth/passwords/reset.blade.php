@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container shadow p-4 my-5 bg-light rounded" >
        <div class="row ">
            <div class="col-md-8">
                <div class=""
                    >
                    <!-- Contenido de la tarjeta aquí -->

                    <div class="card-header" style="text-align: center; width: 151%">{{ __('Restablecer contraseña') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3" style="margin-block-start: 20px; text-align: center; width: 151%">
                                <label for="email"
                                    class="" style="font-size: 18px; font-weight: bold; cursor: text">{{ __('Correo electrónico') }}</label>

                                <div class="">
                                    <input id="email" type="email" style="width: 35%; text-align: center; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-left: 33%"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" disabled autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
