@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('css/layouts.css') }}"> --}}
    <div class="container-fluid"
        style="margin-top: 22px; background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; min-height: 100vh; margin-block-start: -190px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="flex-container" style="margin-block-start: 200px">
                    <div class="card reset">
                        <div style="text-align: center; margin-block-start: -80px">
                            <img src="/images/contraseña.png" alt="Imagen">
                        </div>
                        <h5 style="margin-block-start: 10px;text-align: center;margin-block-end:30px" class="titulo">{{ __('Restablecer Contraseña') }}
                        </h5>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <label style="text-align: right;font-weight:400; color:#00324D"for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                    <div class="col-md-6">
                                        <input
                                            style="width: 120%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; id="email"
                                            type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                            <span   class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style=" font-style: none; text-align: right;font-weight:400; color:#00324D" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                    <div class="col-md-6 position-relative">
                                        <input style="width: 120%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px;"
                                            id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        <!-- Ícono de visibilidad de la contraseña -->
                                        <span style="position: absolute; top: 50%; right: -9%; transform: translateY(-50%);" class="eye-icon" onclick="togglePasswordVisibility('password')">
                                            <i class="fa fa-eye-slash"></i>
                                        </span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label style="text-align: right;font-weight:400;  color:#00324D" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                                    <div class="col-md-6 position-relative">
                                        <input style="width: 120%; border-radius: 50px; border-style: solid; border-width: 4px; border-color: #ececec; background-color: #ececec; height: 45px; margin-bottom: 10px;"
                                            id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <span style="position: absolute; top: 50%; right: -9%; transform: translateY(-50%);" class="eye-icon" onclick="togglePasswordVisibility('password-confirm')">
                                            <i class="fa fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="custom-btn">
                                            {{ __('Restablecer Contraseña') }}<i class="fa-solid fa-user-shield fa-lg"
                                                style="color: #642c78; margin:5px "></i>
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
    <script>
       
function togglePasswordVisibility(fieldId) {
  var passwordField = document.getElementById(fieldId);
  var eyeIcon = passwordField.nextElementSibling.querySelector('i');

  if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
  } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
  }
}

    </script>
@endsection

