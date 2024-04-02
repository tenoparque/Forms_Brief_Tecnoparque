<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciales de Registro</title>
</head>
<body>
    <h1>Bienvenido, {{ $user->name }}!</h1>
    
    <p>Gracias por registrarte en nuestra plataforma. A continuación, encontrarás tus credenciales de inicio de sesión:</p>
    
    <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
    <p><strong>Contraseña:</strong> {{ $password }}</p>

    <p>Por favor, asegúrate de cambiar tu contraseña después de iniciar sesión por primera vez.</p>

    <p>¡Gracias!</p>
</body>
</html>