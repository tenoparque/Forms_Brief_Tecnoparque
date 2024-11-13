    @php
        $user = auth()->user();
    @endphp
    @extends('layouts.app')

    @section('template_title')
        {{ __('Update') }} Solicitude
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
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('AGREGAR CAMBIOS A') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                            {{ __('LA SOLICITUD') }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive"
                                style="background-color: transparent; border-color:transparent; margin-block-start: 40px;">
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
                                                    Categoria
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
                                            <td style="text-align: center">{{ $solicitude->user->nodo ? $solicitude->user->nodo->nombre : 'Sin nodo' }}</td>
                                            <td style="text-align: center">
                                                {{ $solicitude->categoriaEventoEspecial->nombre }}</td>
                                            <td style="text-align: center">{{ $solicitude->estadosDeLasSolictude->nombre }}
                                            </td>

                                        </tr>
                                    </tbody>
                                    <!-- Another tbody is created for the search records -->
                                    <tbody id="Content" class="dataSearched">

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div style="text-align: right">
                                <div class="float-right" id="btnGroupAgregar">
                                    <button class="btnAgregarModificacion" id="btnAgregarModificacion">
                                        {{ __('Agregar Modificación') }}<i class="fa-solid fa-plus fa-lg iconDCR"
                                        style="color: #643178; margin-left: 5px;"></i>

                                    </button>
                                    @if (!$user->hasAnyRole(['Dinamizador', 'Articulador']))
                                    <button class="btnEditarEstado" id="btnEditarEstado">
                                        {{ __('Editar Estado') }}<i class="fa-solid fa-pen-to-square fa-lg"
                                        style="color: #39a900;margin-left: 5px;"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="card-body">

                            <div id="txtModificar" style="display: none;">
                                <div id="campoTexto" style="display: none;">
                                    <div class="form-group">
                                        <label style="color:#00314d; margin-top: 10px;margin-block-end:5px; margin-left: 15px "
                                            for="modificacion">Modificación:</label>
                                        <textarea class="form-control" id="modificacion" name="modificacion"
                                            rows="3"placeholder="Escribe aquí la modificacion a realizar..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <br>
                            <div id="comboboxEstado" style="display: none;">
                                <h5 style="margin-left: 30px; color:#00314d">Estado de la Solicitud</h5>
                                <div style="position: relative">
                                    <select style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;margin-block-end: 15px;" name="id_estado_de_la_solicitud"  name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud"
                                        class="form-control selectpicker" data-style="btn-primary"
                                        title="Seleccionar el estado de la solicitud" required>
                                        <option value="" disabled selected>Seleccionar Estado de la Solicitud...</option>
                                        @foreach ($estadosDeLaSolicitudes as $estadoDeLaSolicitud)
                                            <option value="{{ $estadoDeLaSolicitud->id }}"
                                                {{ ($solicitude->id_estado_de_la_solicitud ?? '') == $estadoDeLaSolicitud->id ? 'selected' : '' }}>
                                                {{ $estadoDeLaSolicitud->nombre }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="icono" style="right: 4%">
                                        <div class="circle-play">
                                            <div class="circle"></div>
                                            <div class="triangle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- BOTONERÍA MODIFICACIÓN --}}
                            <div class="botoneriaModi" style="text-align: right;margin-block-start: -4%">
                                <div class="float-right" id="btnGroupCancelarEnviar" style="display: none;">
                                    <button class="btnCancelar" id="btnCancelar">
                                        {{ __('Cancelar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"
                                            style="vertical-align:-1px;"></i>
                                    </button>
                                    <button type="submit" class="btnEnviarModificacion" id="btnEnviarModificacion">
                                        {{ __('Enviar Modificación') }}<i class="fa-solid fa-share-from-square fa-sm iconDCR"
                                            style="vertical-align:-1px; margin-left: 4px;"></i>

                                    </button>
                                </div>
                            </div>
                            {{-- BOTONERÍA ESTADO --}}
                            <div class="botoneriaEstado" style="text-align: right; margin-block-start: 5%; margin-right: 50px;">
                                <div class="align-right" id="btnGroupCancelarEnviarEstado" style="display: none;">
                                    <button class="btnCancelar" id="btnCancelarEstado">
                                        {{ __('Cancelar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                                    </button>
                                    <button type="submit" class="btnActualizarestado" id="btnEnviarEstado">
                                        {{ __('Actualizar Estado') }}<i class="fa-solid fa-rotate fa-sm iconDCR"
                                            style="vertical-align:-1px; margin-left: 4px;"></i>
                                    </button>
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

                            <h5>Datos por solicitud:</h5>
                            @foreach ($datosPorSolicitud as $dato)
                                <div class="form-group">
                                    <label style=" cursor: default;; outline: none; width: 97%; max-width: 100%; height:45px;margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;""><strong>{{ $dato->titulo }}:</strong></label>
                                    <input type="text" class="form-control" value="{{ $dato->dato }}" readonly
                                    style="cursor: default;; outline: none; width: 100%; max-width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec ; margin-bottom: 10px; margin-top:8px; word-wrap: break-word; overflow-wrap: break-word;">
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ route('solicitudes.index') }}" class="btnRegresar">
                            {{ __('REGRESAR') }}
                            <i class="fa-solid fa-circle-play fa-flip-both iconDCR"></i>
                        </a>
                    </div>
                </div>
            </div>

        </section>

        <form id="formEnviarModificacion" method="POST" action="{{ route('solicitudes.update', $solicitude->id) }}"
            style="display: none;">
            @csrf
            @method('PUT')
            <input type="hidden" name="modificacion" id="modificacionInput">
        </form>

        <form id="formActualizarEstado" method="POST"
            action="{{ route('solicitudes.actualizar_estado', $solicitude->id) }}" style="display: none;">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud_input">
        </form>


        <script>
            //Lógica botonería Modificación

            document.getElementById('btnAgregarModificacion').addEventListener('click', function() {
                document.getElementById('campoTexto').style.display = 'block';
                document.getElementById('txtModificar').style.display = 'block';
                document.getElementById('btnGroupAgregar').style.display = 'none';
                document.getElementById('btnGroupCancelarEnviar').style.display = 'block';
            });

            document.getElementById('btnCancelar').addEventListener('click', function() {
                document.getElementById('campoTexto').style.display = 'none';
                document.getElementById('btnGroupAgregar').style.display = 'block';
                document.getElementById('btnGroupCancelarEnviar').style.display = 'none';
            });
            document.getElementById('btnEnviarModificacion').addEventListener('click', function() {
                var modificacion = document.getElementById('modificacion').value;
                document.getElementById('modificacionInput').value = modificacion;
                document.getElementById('formEnviarModificacion').submit();
            });

            //Lógica botonería Estados
            document.getElementById('btnEditarEstado').addEventListener('click', function() {
                document.getElementById('comboboxEstado').style.display = 'block';
                document.getElementById('btnGroupAgregar').style.display = 'none';
                document.getElementById('btnGroupCancelarEnviarEstado').style.display = 'block';
            });

            document.getElementById('btnCancelarEstado').addEventListener('click', function() {
                document.getElementById('comboboxEstado').style.display = 'none';
                document.getElementById('btnGroupAgregar').style.display = 'block';
                document.getElementById('btnGroupCancelarEnviarEstado').style.display = 'none';
            });

            document.getElementById('btnEnviarEstado').addEventListener('click', function() {
                // Obtener el valor seleccionado del combobox
                var selectedEstadoId = $('#id_estado_de_la_solicitud').val();

                // Verificar si se ha seleccionado un estado
                if (!selectedEstadoId) {
                    // Mostrar un mensaje de error o tomar otra acción apropiada
                    alert('Por favor, selecciona un estado de la solicitud.');
                    return; // Detener el envío del formulario
                }

                // Asignar el nuevo valor al campo oculto
                $('#id_estado_de_la_solicitud_input').val(selectedEstadoId);

                // Enviar el formulario
                $('#formActualizarEstado').submit();
            });

            $('#id_estado_de_la_solicitud').change(function() {
                var selectedEstadoId = $(this).val();
                $('#id_estado_de_la_solicitud_input').val(selectedEstadoId);
            });

            $('#id_estado_de_la_solicitud').change(function() {
                var selectedEstadoId = $(this).val();
                $('#id_estado_de_la_solicitud_input').val(selectedEstadoId);
            });
        </script>
    @endsection
