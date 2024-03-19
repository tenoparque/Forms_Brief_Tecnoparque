@extends('layouts.app')

@section('template_title')
    Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('SOLICITUDES') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search" placeholder="xxx..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('solicitudes.create') }}" class="btnCrear">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play iconDCR"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>No</th>
                                        <th>Tipo De Solicitud</th>
                                        <th>Fecha Y Hora</th>
                                        <th>Nodo</th>
                                        <th>Usuario</th>
                                        <th>Evento</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($solicitudes as $solicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $solicitude->tiposdesolicitude->nombre }}</td>
                                            <td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                                            <td>{{ $solicitude->user->nodo->nombre }}</td>
                                            <td>{{ $solicitude->user->name }}</td>
                                            <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                            <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>

                                            <td id="buttoncell">
                                                <a href="{{ route('solicitudes.show', $solicitude->id) }}"
                                                    class="btnDetalle">
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"></i>
                                                    {{ __('Detalle') }}

                                                </a>

                                                <a href="{{ route('solicitudes.edit', $solicitude->id) }}"
                                                    class="btnModificar">
                                                    <i class="fa-solid fa-pen-to-square fa-xs iconEdit"></i>
                                                    {{ __('Modificar') }}

                                                </a>

                                                <a href="{{ route('solicitudes.edit', $solicitude->id) }}"
                                                    class="btnDuplicar">
                                                    <i class="fa-solid fa-clone fa-xs" style="color: #642c78;"></i>
                                                    {{ __('Duplicar') }}

                                                </a>
                                                <button
                                                    class="btnAsignar" id="btnVerAsignacion" data-toggle="modal"
                                                data-target="#asignacionModal">
                                                    <i class="fa-solid fa-user-plus" style="color: #642c78;"></i>
                                                    {{ __('Asignar a diseñador') }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>

                        <!-- Modal para mostrar la asiganción de una solicitud un diseñador-->
                        <div class="modal fade" id="asignacionModal" tabindex="-1" role="dialog"
                            aria-labelledby="historialModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="margin-left: 60px;  position: relative; color: #00324D"
                                            class="modal-title" id="historialModalLabel">ASIGNAR SOLICITUD A UN DISEÑADOR
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div style="position: relative;">
                                            <select name="id_ciudad" id="id_ciudad" class="form-control selectpicker" data-style="btn-primary"
                                                title="Seleccionar diseñador" required
                                                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 10px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                                                <option value="" disabled selected>Seleccionar diseñador...</option>
                                                
                                            </select>
                                            <div class="icono" style="right: 4%;">
                                                <div class="circle-play">
                                                    <div class="circle"></div>
                                                    <div class="triangle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal">
                                            {{ __('Cerrar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <title>Calendario con Días Excluidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .calendar {
            width: 300px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .month {
            text-align: center;
            margin-bottom: 10px;
        }

        .days {
            display: flex;
            flex-wrap: wrap;
        }

        .day {
            width: calc(100% / 7);
            height: 40px;
            line-height: 40px;
            text-align: center;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<?php
// Iterar sobre cada mes del año
for ($mes = 1; $mes <= 12; $mes++) {
    echo '<div class="calendar">';
    echo '<div class="month">' . date('F', mktime(0, 0, 0, $mes, 1)) . ' 2024</div>'; // Obtener el nombre del mes
    echo '<div class="days">';

    // Iterar sobre los días del mes actual
    $num_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, 2024); // Año bisiesto, ejemplo 2024
    for ($dia = 1; $dia <= $num_dias_mes; $dia++) {
        $fecha_actual = '2024-' . sprintf('%02d', $mes) . '-' . sprintf('%02d', $dia); // Construir fecha en formato 'año-mes-día'

        // Verificar si la fecha actual es un día que se desea excluir
        if (!in_array($fecha_actual, $disabledDates)) {
            echo '<div class="day">' . $dia . '</div>';
        }
    }

    echo '</div>';
    echo '</div>';
}
?>
</body> --}}
                </div>
                {!! $solicitudes->links() !!}
            </div>
        </div>
        </div>

        <script>
            // Agrega un evento click al botón "Ver Asignación"
            document.getElementById('btnVerAsignacion').addEventListener('click', function() {
                // Abre el modal cuando se haga clic en el botón
                $('#asignacionModal').modal('show');
            });
    
            // Agrega un evento click a todos los botones de clase "cerrar-modal"
            document.querySelectorAll('.cerrar-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Cierra el modal cuando se haga clic en el botón
                    $('#asignacionModal').modal('hide');
                });
            });
        </script>

    @endsection
