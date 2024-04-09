<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../public/css/layout.css">
</head>

<body>
    <div class="container">
        <p>
            <span style="color: {{ $colorSecundario }}">Hola,</span>
            <span style="color: {{ $colorPrincipal }}">{{ $user->name }} {{ $user->apellidos }}</span>
        </p>

        <p>@lang('Está siendo notificado mediante este correo electrónico debido a que hemos registrado una petición de restablecimiento de contraseña para su cuenta.')</p>

        <a class="btnResetYourPassword"
            style="border: 2px solid #82def0;
                    color: #00324d;
                    border-radius: 35px;
                    background: #fff; 
                    padding: 10px 24px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 14px;"
            href="{{ route('password.reset', ['token' => $token]) }}">Cambia tu contraseña</a>

        <p>@lang('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')])</p>

        <p>@lang('If you did not request a password reset, no further action is required.')</p>
    </div>
</body>

</html>
