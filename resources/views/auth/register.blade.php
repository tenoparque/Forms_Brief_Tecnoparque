@extends('layouts.app')

@section('content')
    

   

    <section class="container shadow p-3  my-5 bg-light rounded">
        <div class="d-flex mt-3 mb-4">
            <div>
                <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('REGISTRAR') }}</h1>
            </div>
            <div>
                <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('USUARIO') }}</h1>
            </div>
        </div>
            <form method="POST" action="{{ route('register') }}" class="row g-3">
                @csrf
    
                <div class="col-md-4">
                    <label for="name" class="form-label col-12 ">{{ __('Nombres') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name"  style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="col-md-4">
                    <label for="apellidos" class="form-label col-12 ">{{ __('Apellidos') }}</label>
                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"
                        name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                    @error('apellidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
    
                <div class="col-md-4">
                    <label for="celular" class="form-label col-12 ">{{ __('Celular') }}</label>
                    <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror"
                        name="celular" value="{{ old('celular') }}" required autocomplete="celular" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                    @error('celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
                </div>
    
                <div class="col-12">
                    <label for="email" class="form-label col-12 ">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
    
    
                <!--  -->
                <div class="col-md-6">
                    <label for="id_nodo" class="form-label col-12 ">{{ __('Nodo') }}</label>
                    <div class="col-md-12">
                        <select id="id_nodo" class="form-control @error('id_nodo') is-invalid @enderror" name="id_nodo"
                            required style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
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
                    <label for="role" class="form-label col-12 ">{{ __('Rol') }}</label>
    
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                        <option value="" disabled selected >Seleccionar Rol...</option>
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
                    <label for="password" class="form-label col-12 ">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="col-md-6">
                    <label for="password-confirm" class="form-label col-12 ">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
    
                </div>
    
                <div class="box-footer mt20">
                    <button type="submit" class="btn btn-outline"  href="{{ route('users.create') }}" class="btn btn-outline"
                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; "
                     onmouseover="this.style.backgroundColor='#b2ebf2';"
                    onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
                    <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
                </div>
            </form>
        </div>
    </section>
@endsection
