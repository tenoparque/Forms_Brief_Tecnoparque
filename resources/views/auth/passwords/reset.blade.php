@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container shadow p-4 my-5 bg-light rounded" >
        <div class="row ">
            <div class="col-md-8">
                <div class=""
                    >
                    <!-- Contenido de la tarjeta aquí -->

                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email"
                                    class="" style="font-size: 18px; font-weight: bold;margin-left: 35px;">{{ __('Email Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" style="width: 95%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec;  margin-left: 25px; margin-bottom: 10px;"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
