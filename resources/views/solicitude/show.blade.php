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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card"
                                    style="border-radius: 20px; border:none; margin-top: 5px;margin-block-end: 50px;">
                                    <div class="containerProgressBar">
                                        <ul class="progressbar">
                                            @foreach($estados as $estado)
                                                <li class="{{ $estado->orden_mostrado <= $estadoActual->orden_mostrado ? 'active' : '' }}">
                                                    <span>{{ $estado->nombre }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        @if ($historial->isNotEmpty())
                                            

                                            <p><strong>Fecha de última modificación:</strong>
                                                {{ $historial->first()->fecha_de_modificacion }}</p>
                                            <p
                                                style="cursor:pointer; outline: none; width: 100%; max-width: 100%; height:45px;margin-bottom: 10px; margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;">
                                                <strong>Modificación:</strong> {{ $historial->first()->modificacion }}</p>
                                            <button
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:140px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 87%; word-wrap: break-word; overflow-wrap: break-word;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';"type="button"
                                                class="btn btn-outline" id="btnVerHistorial" data-toggle="modal"
                                                data-target="#historialModal">
                                                Ver historial
                                                <i class="fa-solid fa-clock-rotate-left fa-sm" style="color: #642c78;"></i>
                                                </a></button>
                                        @else
                                            <p>No hay historial de modificaciones</p>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive"
                            style="background-color: transparent; border-color:transparent; margin-block-start: 10px;">
                            <table class="table table-bordered table-hover"
                                style="background-color: transparent; border-color: transparent">
                                <thead class="thead-dark">
                                    <tr class="table-light" style="border-color:transparent">
                                        <th class="table-light" style="text-align: center; border-color:transparent">
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
                                    style="border-radius: 20px; border:none; margin-top: 5px;margin-block-end: 50px;">
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
                                            <button
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:140px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 87%; word-wrap: break-word; overflow-wrap: break-word;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';"type="button"
                                                class="btn btn-outline" id="btnVerHistorial" data-toggle="modal"
                                                data-target="#historialModal">
                                                Ver historial
                                                <i class="fa-solid fa-clock-rotate-left fa-sm" style="color: #642c78;"></i>
                                                </a></button>
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
                    <h5 style="margin-right: 155px; position: relative; color: #00324D" class="modal-title" id="historialModalLabel">Historial de modificaciones</h5>
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
                <div class="modal-footer">
                    <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal">
                        {{ __('Cerrar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                    </button>
                </div>


            </div>
        </div>
    </div>
    
    <style>
        .containerProgressBar {
            background-color: rgb(231, 231, 231);
            height: 200px;
            width: 60%;
            position: relative;
            z-index: 1; /* Asegura que el div esté en frente */
            overflow: hidden; /* Oculta el contenido que se desborda */
            border-radius: 20px;
            padding: 20px;
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style-type: none;
            float: left;
            width: 33.33%;
            position: relative;
            text-align: center;
            z-index: 2; /* Keep circles behind the div */
        }

        .progressbar li span {
            position: relative;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border: 1px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }

        .progressbar li::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px; /* Increase line width if needed */
            background-color: #ddd; /* Change line color */
            top: 15px;
            left: -46%;
            z-index: -1; /* Keep lines behind the div */
        }

        .progressbar li:first-child::after {
            content: none;
        }

        .progressbar li.active {
            color: red;
        }

        .progressbar li.active:before {
            border-color: red;
        }

        .progressbar li.active + li:after {
            background-color: red;
        }
    </style>

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
