<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logo.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/logo.png') }}">
</head>
<body>
    <div id="main-container">
        <div id="logo">@include('errors.logo')</div>
        

        <!-- First of all, it is verified that the user is authenticated. -->
        @if (auth()->check())
            <!-- If the user is authenticated then -->
            @if (Gate::denies('permission-name'))
                <!-- If the user does not have the necessary permissions -->
                <h1>403 - Permission Denied</h1>
                <p>No tienes los permisos necesarios para acceder a este recurso.</p>
                
            @endif
        @else
        <!-- If the user is not authenticated then -->
            <h1>403 - Not Authenticated</h1>
            <p>Necesitas autenticarte para acceder a este recurso.</p>
        @endif
    </div>
</body>
<style>
    body {
        display: flex;
        justify-content: center; /* Centrar horizontalmente */
        align-items: center; /* Centrar verticalmente */
        height: 100vh; /* Altura completa de la ventana */
        margin: 0;
        font-family: "Work Sans", sans-serif;
        background-color: #f5f5f5; /* Color de fondo */
    }

    #main-container {
        width: 50%;
        padding: 30px;
        border-style: solid;
        border-color: #DEE2E6;
        border-width:2px; 
        border-radius: 18px;
        background-color: #F8F9FA;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Ajustar el valor de la opacidad */
        
    }

    #logo {
        text-align: right;
    }

    * {
        font-family: "Work Sans", sans-serif;
    }
</style>
</html>