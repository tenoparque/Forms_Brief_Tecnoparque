<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

.estilo{
            background-color: black;
            color: white ;
        }

    </style>
</head>
<body>
    <h1 style="text-align:center ">SOLICITUDES</h1><br>
    <table class="table" style="text-align: center;font-size:20px">
        <thead class="estilo">
            <tr style="border-width: 2px">
                
                <th>Tipo De Solicitud</th>
                <th>Fecha Y Hora</th>
                <th>Nodo</th>
                <th>Usuario</th>
                <th>Evento</th>
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody class="alldata">
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
</body>
</html>