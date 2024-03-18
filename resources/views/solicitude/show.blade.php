@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? " __('Show') Solicitude" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLE DE') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                        {{ __('LA SOLICITUD') }}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            @if ($historial->isNotEmpty())
                                <p><strong>Fecha de última
                                        modificación:</strong>{{ $historial->first()->fecha_de_modificacion }}</p>
                                <p><strong>modificación:</strong>{{ $historial->first()->modificacion }}</p>
                                <button type="button" class="btn btn-primary" id="btnVerHistorial" data-toggle="modal"
                                    data-target="#historialModal">
                                    Ver historial
                                </button>
                            @else
                                <p>No hay historial de modificaciones</p>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="background-color: transparent; border-color:transparent">
                            <table class="table table-bordered table-hover"
                                style="background-color: transparent; border-color: transparent">
                                <thead class="thead-dark">
                                    <tr class="table-light" style="border-color:transparent">
                                        <th class="table-light"  style="text-align: center; border-color:transparent">
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

                        <div class="form-group">
                            <strong>Servicios asociados:</strong>
                            <ul>
                                @foreach ($elementos as $elemento)
                                    <li>{{ $elemento->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <h5>Datos por solicitud:</h5>
                        @foreach ($datosPorSolicitud as $dato)
                            <div class="form-group">
                                <label><strong>{{ $dato->titulo }}:</strong></label>
                                <input  type="text" class="form-control" value="{{ $dato->dato }}" readonly
                                    style="cursor: initial; outline: none; width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec ; margin-bottom: 10px; margin-top:8px">
                            </div>
                        @endforeach

                    </div>


                </div>
                <div>
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-outline"
                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 90%;"
                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                        onmouseout="this.style.backgroundColor='#FFFF';">
                        {{ __('REGRESAR') }}
                        <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
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
                    <h5 class="modal-title" id="historialModalLabel">Historial de modificaciones</h5>
                    <button type="button" class="cerrar-modal" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($historial as $item)
                            <li>
                                <strong>Fecha: </strong> {{ $item->fecha_de_modificacion }}
                                <br>
                                <strong>Modificación:</strong> {{ $item->modificacion }}
                                <hr>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cerrar-modal" data-dismiss="modal">Cerrar</button>
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
