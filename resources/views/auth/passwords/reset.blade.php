@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
    <div class="container-fluid"
        style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; min-height: 100vh; margin-block-start: -190px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="flex-container" style="margin-block-start: 200px">
                    <div class="card reset">
                        <div style="text-align: center; margin-block-start: -60px">
                            <img src="/images/contraseña.png" alt="Imagen">
                        </div>
                        <h5 style="margin-block-start: 20px;text-align: center;" class="titulo">{{ __('Reset Password') }}
                        </h5>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input
                                            style="width: 120%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; id="email"
                                            type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input
                                            style="width: 120%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; id="password"
                                            type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input
                                            style="width: 120%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px;id="password-confirm"
                                            type="password" class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="custom-btn">
                                            {{ __('Restablecer Contraseña') }}<i class="fa-solid fa-user-shield fa-lg"
                                                style="color: #642c78; margin:5px"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
