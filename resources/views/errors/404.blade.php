<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="main-container">
        <div id="logo">@include('errors.logo')</div>
            <h1>404 - Page Not Found</h1>
            <p>Página no encontrada.</p>
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