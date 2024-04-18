<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Solicitudes</title>
    <link rel="stylesheet" href="../public/css/layout.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table-pdf tbody tr:last-of-type {
            border-bottom: 2px solid {{ $colorPrincipal }};
        }


        .table-pdf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: {{ $colorPrincipal }}E6;
            color: #fff;
        }
    </style>

</head>

<body>
    <header class="pdf-header">
        <div class="container__header-title">
            <div>
                <h1 class="title__pdf-report">SOLICITUDES</h1><br>
            </div>
        </div>
        <div class="img-header">
            <div class="img__container-pdf">
                <div>
                    <img class="img__header-pdf" id=""
                        src="data:image/png;base64,{{ base64_encode($logo) }} "></img>
                </div>
            </div>
        </div>


    </header>

    <div style="container__table-pdf">
        <table class="table-pdf">
            <thead class="">
                <tr>
                    <th>Tipo de Solicitud</th>
                    <th>Fecha y Hora</th>
                    <th>Nodo</th>
                    <th>Usuario</th>
                    <th>Evento</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitude)
                    <tr>
                        <td>{{ $solicitude->tiposdesolicitude->nombre }}</td>
                        <td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                        <td>{{ $solicitude->user->nodo->nombre }}</td>
                        <td>{{ $solicitude->user->name }}</td>
                        <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                        <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
