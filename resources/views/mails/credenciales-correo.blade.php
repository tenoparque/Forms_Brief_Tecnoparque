<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>Credenciales de Registro</title>
</head>

<body>

    @if (isset($logo))
        <img style="width: 100%" class="ImgHeader" id="logoHeader" src="data:image/png;base64,{{ base64_encode($logo) }}"></img>
    @endif


    <h2 style="color: {{ $colorPrincipal }}; ">Bienvenido a Brief!</h2>

    <p>Hola {{ $user->name }}, gracias por registrarte en nuestra plataforma. Tus credenciales para ingresar son:</p>
    <br>
    <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
    <p><strong>Contraseña:</strong> {{ $password }}</p>

    <br>

    <p>Con las anteriores credenciales podrás iniciar sesión mediante el siguiente boton:</p>

    <a href="http://127.0.0.1:8000/login">
        <button
            style="padding: 10px 20px;
  background-color: {{ $colorPrincipal }};
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;">Iniciar
            sesión</button>
    </a>

    <p>¡Gracias!</p>
    <p>Brief</p>

    <p>Este correo es solo informativo por favor no lo responda.</p>

    <p>Si tiene problemas para hacer clic en el botón "Iniciar sesión", copie y pegue la siguiente URL en su navegador
        web:</p><a href="http://127.0.0.1:8000/login">Iniciar sesión</a>

</body>

</html>
