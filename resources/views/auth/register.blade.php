@extends('layouts.app')

@section('content')
    

   

    <section class="container shadow p-3  my-5 bg-light rounded">

        <div>
            <h2>
                <spna class="segundaPalabaraFlex">{{ __('REGISTRAR') }}</spna>
                <spna class="primeraPalabraFlex">{{ __('USUARIOS ') }}</spna>
            </h2>
        </div>
        <form method="POST" action="{{ route('register') }}" class="row g-3">
            @csrf

            <div class="col-md-4">
                <label for="name" class="form-label col-12 text-start">{{ __('Nombres') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="apellidos" class="form-label col-12 text-start">{{ __('Apellidos') }}</label>
                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"
                    name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="col-md-4">
                <label for="celular" class="form-label col-12 text-start">{{ __('Celular') }}</label>
                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror"
                    name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="col-12">
                <label for="email" class="form-label col-12 text-start">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <!--  -->
            <div class="col-md-6">
                <label for="id_nodo" class="form-label col-12 text-start">{{ __('Nodo') }}</label>
                <div class="col-md-12">
                    <select id="id_nodo" class="form-control @error('id_nodo') is-invalid @enderror" name="id_nodo"
                        required>
                        <option value="" disabled selected>Seleccionar Nodo...</option>
                        @foreach ($nodos as $nodo)
                            <option value="{{ $nodo->id }}">{{ $nodo->nombre }}</option>
                        @endforeach
                    </select>

                    @error('id_nodo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!--  -->
            <div class="col-md-6">
                <label for="role" class="form-label col-12 text-start">{{ __('Rol') }}</label>

                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                    <option value="" disabled selected>Seleccionar Rol...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label col-12 text-start">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password-confirm" class="form-label col-12 text-start">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">

            </div>

            <div class="col-md-12 d-flex justify-content-end">

                <button type="submit" class="btn btn-primary ">
                    {{ __('Register') }}
                </button>

            </div>

        </form>
    </section>
@endsection
