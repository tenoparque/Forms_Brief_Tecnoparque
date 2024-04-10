<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- First of all, it is verified that the user is authenticated. -->
    @if (auth()->check())
        <!-- If the user is authenticated then -->
        @if (Gate::denies('permission-name'))
            <!-- If the user does not have the necessary permissions -->
            <h1>403 Permission Denied</h1>
            <p>No tienes los permisos necesarios para acceder a este recurso.</p>
        @endif
    @else
    <!-- If the user is not authenticated then -->
        <h1>403 Not Authenticated</h1>
        <p>Necesitas autenticarte para acceder a este recurso.</p>
    @endif
</body>
</html>