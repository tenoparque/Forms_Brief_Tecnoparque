@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} User
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('css/layout.css') }}"> --}}
    <section class="container  shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class = "">
                    <div class="d-flex mt-3 mb-4">
                        <div>
                            <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('REGISTRAR') }}</h1>
                        </div>
                        <div>
                            <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('USUARIO') }}</h1>
                        </div>
                    </div>

                    <form method="POST" class="row" action="{{ route('register') }}">
                        @csrf

                        <div class="col-md-4">
                            <label style="font-size: 18px; color:black; font-weight: bold" for="name"
                                class="form-label col-12 ">{{ __('Nombres') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;" placeholder="Nombres">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label style="font-size: 18px;color:black; font-weight: bold" for="apellidos"
                                class="form-label col-12 ">{{ __('Apellidos') }}</label>
                            <input id="apellidos" type="text"
                                class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                                value="{{ old('apellidos') }}" required autocomplete="apellidos"
                                style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;" placeholder="Apellidos">
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label style="font-size: 18px; color:black; font-weight: bold" for="celular"
                                class="form-label col-12 ">{{ __('Celular') }}</label>
                            <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror"
                                name="celular" value="{{ old('Celular') }}" required autocomplete="celular"
                                style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;" placeholder="Celular">
                            @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-md-4">
                            <label style="font-size: 18px; color:black; font-weight: bold" for="email"
                                class="form-label col-12 ">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;" placeholder="Correo electrónico">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">

                            <label style="font-size: 18px; color:black; font-weight: bold" for="id_nodo"
                                class="form-label col-12 ">{{ __('Nodo') }}</label>
                            <div class="col-md-12">
                                <div style="position: relative; width: 100%;">
                                    <select id="id_nodo" class="form-control @error('id_nodo') is-invalid @enderror"
                                        name="id_nodo" required
                                        style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px;">
                                        <option value="" disabled selected>Seleccionar Nodo...</option>
                                        @foreach ($nodos as $nodo)
                                        <option value="">Sin nodo</option>
                                            <option value="{{ $nodo->id }}">{{ $nodo->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <div class="icono" onclick="toggleSelect()">
                                        <div class="circle-play">
                                            <div class="circle"></div>
                                            <div class="triangle"></div>
                                        </div>
                                    </div>
                                </div>


                                @error('id_nodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label style="font-size: 18px; color:black; font-weight: bold" for="role"
                                class="form-label col-12 ">{{ __('Rol') }}</label>
                            <div class="col-md-12">
                                <div style="position: relative; width: 100%;">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror"
                                        name="role" required
                                        style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px;" placeholder="Rol">
                                        <option value="" disabled selected>Seleccionar Rol...</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="icono">
                                        <div class="circle-play">
                                            <div class="circle"></div>
                                            <div class="triangle"></div>
                                        </div>
                                    </div>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="box-footer my-2 d-flex justify-content-end">
                            <button type="submit" class="btnGuardar"
                                href="{{ route('users.create') }}">{{ __('GUARDAR') }}
                                <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#celular').keypress(function(e) {
                if (this.value.length == 10) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
