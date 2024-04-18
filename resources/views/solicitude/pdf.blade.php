<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Solicitudes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @page {
            margin: 3cm 1.5cm 3cm 1.5cm;
        }

        .pdf-header {
            position: fixed;
            top: -2cm;
            left: 0;
            width: 100%;
            height: 60px;
            /* Ajusta según sea necesario */
        }

        .container__header-title {
            display: inline-block;
            /* Convertir en bloque en línea */
            vertical-align: middle;
            /* Alinear verticalmente */
        }

        .img-header {
            display: inline-block;
            /* Convertir en bloque en línea */
            vertical-align: middle;
            /* Alinear verticalmente */
            margin-left: auto;
            padding-left: 300px;
            /* Empujar la imagen hacia el extremo derecho */
        }

        .title__pdf-report {
            margin: 0;
            padding-top: 20px;
            font-size: 24px;

        }

        .img-header img {
            width: 240px;
            height: 155px;
            max-width: 200px;
            height: auto;
        }

        .container__table-pdf {
            margin-top: 40px;
        }

        .table-pdf {
            border-collapse: collapse;
            width: 100%;
            border-radius: 18px;
            margin-top: 20px;

        }

        .table-pdf td,
        .table-pdf th {
            border: 1px solid #ddd;
            padding: 5px;

        }

        .table-pdf tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        .table-pdf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #38a900;
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
                    <img class="" id="" src="data:image/png;base64,{{ base64_encode($logo) }} "></img>
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
