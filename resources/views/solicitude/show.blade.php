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
                            <p><strong>Fecha de última modificación:</strong>{{ $historial->first()->fecha_de_modificacion }}</p>
                            <p><strong>modificación:</strong>{{ $historial->first()->modificacion }}</p>
                            <button type="button" class="btn btn-primary" id="btnVerHistorial" data-toggle="modal" data-target="#historialModal">
                                Ver historial
                            </button>
                            @else
                                <p>No hay historial de modificaciones</p>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive"
                            >
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>
                                        <td>{{ $solicitude->tiposdesolicitude->nombre }}</td>
                                        <td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                                        <td>{{ $solicitude->user->name }}</td>
                                        <td>{{ $solicitude->user->nodo->nombre }}</td>
                                        <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                        <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>
                                        <td>{{ $solicitude->user->nodo->nombre }}</td>
                                        <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                        <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>
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
                                    <input type="text" class="form-control" value="{{ $dato->dato }}" readonly style="cursor: initial; outline: none;">
                                </div>
                            @endforeach

                    </div>

                    
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <a href="{{ route('solicitudes.index') }}" class="btnRegresar"
                        >
                        {{ __('REGRESAR') }}
                        <i class="fa-solid fa-circle-play fa-flip-both iconDCR" style="color: #642c78;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal para mostrar el historial completo -->
    <div class="modal fade" id="historialModal" tabindex="-1" role="dialog" aria-labelledby="historialModalLabel" aria-hidden="true">
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
