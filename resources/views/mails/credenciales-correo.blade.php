<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <img style="height: 15%; width: 35%" src="https://redtecnoparque.com/wp-content/uploads/2023/07/LOGOS-NODOS-2-02.png"></img>

    <h2 style="font-size: 25px;">
        <span style="font-size: 25px; text-align: justify; color: {{ $colorSecundario }}">Bienvenido a Brief ‎</span>
        <span style="text-align: justify; color: {{ $colorPrincipal }}"> {{ $user->name }} {{ $user->apellidos }}</span>
    </h2>

    <p style="font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">El registro a nuestra plataforma se realizó de forma exitosa. Tus credenciales para ingresar son:</p>

    <p style="font-size: 16px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"><strong>Correo electrónico:</strong> {{ $user->email }}</p>
    <p style="font-size: 16px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"><strong>Contraseña:</strong> {{ $password }}</p>

    <p style="font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Con las anteriores credenciales podrás iniciar sesión mediante el siguiente botón:</p>

    <a href="https://divulgacion3.tecnoparquebucaramanga.com/login">
        <button style="font-size: 14px; text-align: center; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; cursor: pointer; padding: 10px 20px; background-color: {{ $colorPrincipal }}; color: white; border: none; border-radius: 8px;" class="logInEma">Iniciar sesión</button><br>
    </a>
    
    <br>

    <p style="font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Gracias, </p>
    <p style="font-size: 16px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Centro de Apoyo Brief</p>

    <br>

    <p style="font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Si tiene problemas para hacer clic en el botón de "Iniciar sesión", da clic en la siguiente URL:</p><a href="http://127.0.0.1:8000/login" style="text-decoration: none; font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Iniciar sesión</a>
  <br><br>

    <p style="font-size: 16px; text-align: justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"><i><b>Este correo es solo informativo, por favor no responder.</i></b></p>

</body>

</html>
