@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? " __('Show') Solicitude" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container cardsoli">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4" style=" padding-bottom: 25px;">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLE DE') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                        {{ __('LA SOLICITUD') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row top justify-content-center">
                            <div style="padding-left:3%;" class="col-3 text-center">
                                <img src="../images/Mesa de trabajo 1.png" alt="icon" class="img-fluid" style="max-width: 100px;">
                            </div>
                            <div class="col-3 text-center">
                                <img src="../images/iconos Brief-02.png" alt="icon" class="img-fluid" style="max-width: 100px; margin-right: 40%;">
                            </div>
                            <div class="col-2 text-center">
                                <img src="../images/iconos Brief-03.png" alt="icon" class="img-fluid" style="max-width: 100px; margin-left: -95%;">
                            </div>
                            <div class="col-2 text-center">
                                <img src="../images/ajustes.png" alt="icon" class="img-fluid" style="max-width: 50px; margin-block-start: 23px; margin-right: 65%;">
                            </div>
                            <div class="col-2 text-center">
                                <img src="../images/iconos Brief-04.png" alt="icon" class="img-fluid" style="max-width: 100px;">
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="">
                                <div class="containerProgressBar">
                                    <ul id="progressbar" class="progressbar">
                                        @foreach ($estados as $estado)
                                            <li
                                                class="step0 {{ $estado->orden_mostrado <= $estadoActual->orden_mostrado ? 'active' : '' }} {{ $estado->nombre }}">
                                                <span>{{ $estado->nombre }}</span>
                                                <i class="fas fa-check-circle" style="display: none;"></i>
                                                <!-- Icono de check -->
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <script>
                        function cambiarEstado() {
                            // Aquí obtén el índice del estado actual o cualquier otra lógica necesaria para determinar cuál estado se ha completado
                            // Supongamos que tienes una variable llamada 'indiceEstadoActual' que representa el índice del estado actual

                            // Mostrar el icono de check correspondiente al estado completado
                            const iconoCheck = document.querySelectorAll('.progressbar li i')[indiceEstadoActual];
                            iconoCheck.style.display = 'inline-block';
                        }


                        
                    </script>
                    <div style="margin-top: 80px" class="card-body">
                        <div class="table-responsive"
                            style="background-color: transparent; border-color:transparent; margin-block-start: 10px;">
                            <table class="table table-bordered table-hover"
                                style="background-color: transparent; border-color: transparent">
                                <thead class="thead-dark">
                                    <tr class="table-light" style="border-color:transparent">
                                        <th class="table-light" style="border-width: 2px; border-color:transparent">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-solid fa-envelope-open-text fa-2xl"
                                                    style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Tipo de Solicitud
                                            </div>
                                        </th>

                                        <th style="text-align: center">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-solid fa-calendar-days fa-2xl" style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Fecha y Hora
                                            </div>
                                        </th>
                                        <th style="text-align: center">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-solid fa-circle-user fa-2xl" style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Usuario
                                            </div>
                                        </th>
                                        <th style="text-align: center">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-solid fa-location-dot fa-2xl" style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Nodo
                                            </div>
                                        </th>
                                        <th style="text-align: center">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-regular fa-calendar-check fa-2xl" style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Eventos
                                            </div>
                                        </th>
                                        <th style="text-align: center">
                                            <div style="margin-bottom: 10px;">
                                                <i class="fa-solid fa-shuffle fa-2xl" style="color: #00314d;"></i>
                                            </div>
                                            <div>
                                                Estado
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr class="table-light" style="border-color:transparent">
                                        <td style="text-align: center">{{ $solicitude->tiposdesolicitude->nombre }}</td>
                                        <td style="text-align: center">{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                                        <td style="text-align: center">{{ $solicitude->user->name }}</td>
                                        <td style="text-align: center">{{ $solicitude->user->nodo->nombre }}</td>
                                        <td style="text-align: center">
                                            {{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                        <td style="text-align: center">{{ $solicitude->estadosDeLasSolictude->nombre }}
                                        </td>

                                    </tr>
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card"
                                    style="border-radius: 20px; border:none; margin-top: 5px;margin-block-end: 40px;">
                                    <div class="card-body">
                                        <h5 style="color: #00324D">ULTIMA MODIFICACION REALIZADA</h5>
                                        <br>
                                        @if ($historial->isNotEmpty())
                                            <p><strong>Fecha de modificación:</strong>
                                                {{ $historial->first()->fecha_de_modificacion }}</p>
                                            <p
                                                style="cursor:text; outline: none; width: 100%; max-width: 100%; height:45px;margin-bottom: 10px; margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;">
                                                <strong>Cambios:</strong> {{ $historial->first()->modificacion }}
                                            </p>
                                            <div class="align-right">
                                                <button style="margin-left:85%" type="button" class="btnVerHistorial"
                                                    id="btnVerHistorial" data-toggle="modal" data-target="#historialModal">
                                                    Ver historial
                                                    <i class="fa-solid fa-clock-rotate-left fa-sm iconDCR"></i>
                                                </button>
                                            </div>
                                        @else
                                            <p>No hay historial de modificaciones</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Servicios asociados:</strong>
                            <ul>
                                @foreach ($elementos as $elemento)
                                    <li>{{ $elemento->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br><br>
                        <h5>Datos por solicitud:</h5>
                        <div class="row">
                            @foreach ($datosPorSolicitud as $dato)
                                <div class="">
                                    <label
                                        style="cursor: initial; outline: none; width: 95%;
                               height:20px; margin-bottom: 10px; margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;"><strong>{{ $dato->titulo }}:</strong></label>
                                    <input type="text" class="form-control" value="{{ $dato->dato }}" readonly
                                        style="cursor: default;; outline: none; width: 100%; max-width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec ; margin-bottom: 10px; margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;">
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('solicitudes.index') }}" class="btnRegresar">
                            {{ __('REGRESAR') }}
                            <i class="fa-solid fa-circle-play fa-flip-both iconDCR"></i>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    <!-- Modal para mostrar el historial completo -->
    <div class="modal fade" id="historialModal" tabindex="-1" role="dialog" aria-labelledby="historialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="margin-right: 155px; position: relative; color: #00324D" class="modal-title"
                        id="historialModalLabel">Historial de modificaciones</h5>
                    <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal" aria-label="Cerrar">
                        <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($historial as $item)
                            <li style="word-wrap: break-word; overflow-wrap: break-word;">

                                <strong>Fecha de Modificación:</strong> {{ $item->fecha_de_modificacion }}
                                <br>
                                <strong>Detalles de la Modificación:</strong> {{ $item->modificacion }}
                                <hr>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer"style="display: none;">

                    <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal">
                        {{ __('Cerrar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR" style="padding: 10px"></i>
                    </button>
                </div>


            </div>
        </div>
    </div>



    <script>
        // Agrega un evento click al botón "Ver historial"
        document.getElementById('btnVerHistorial').addEventListener('click', function() {
            // Abre el modal cuando se haga clic en el botón
            $('#historialModal').modal('show');
        });

        // Agrega un evento click a todos los botones de clase "cerrar-modal"
        document.querySelectorAll('.cerrar-modal').forEach(function(button) {
            button.addEventListener('click', function() {
                // Cierra el modal cuando se haga clic en el botón
                $('#historialModal').modal('hide');
            });
        });


        
    </script>
    
@endsection
