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
                        <br>
                        <div style="text-align: center">
                            <div class="float-right" id="btnGroupAgregar">
                                <button class="btn btn-primary" id="btnAgregarModificacion">
                                    {{ __('Agregar Modificación') }}
                                </button>
                                <button class="btn btn-primary" id="btnEditarEstado">
                                    {{ __('Editar Estado') }}
                                </button>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">

                        <div id="txtModificar" style="display: none;">
                            <div id="campoTexto" style="display: none;">
                                <div class="form-group">
                                    <label for="modificacion">Modificación:</label>
                                    <textarea class="form-control" id="modificacion" name="modificacion" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <br>

                        <br>
                        <div id="comboboxEstado" style="display: none;">
                            <h3>Estado de la Solicitud</h3>
                            <select name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud"
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
                        </div>

                        {{-- BOTONERÍA MODIFICACIÓN --}}
                        <div class="float-right" id="btnGroupCancelarEnviar" style="display: none;">
                            <button class="btn btn-secondary mr-2" id="btnCancelar">
                                {{ __('Cancelar') }}
                            </button>
                            <button type="submit" class="btn btn-success" id="btnEnviarModificacion">
                                {{ __('Enviar Modificación') }}
                            </button>
                        </div>

                        {{-- BOTONERÍA ESTADO --}}
                        <div class="float-right" id="btnGroupCancelarEnviarEstado" style="display: none;">
                            <button class="btn btn-secondary mr-2" id="btnCancelarEstado">
                                {{ __('Cancelar') }}
                            </button>
                            <button type="submit" class="btn btn-success" id="btnEnviarEstado">
                                {{ __('Actualizar Estado') }}
                            </button>
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
                                <input type="text" class="form-control" value="{{ $dato->dato }}" readonly
                                    style="cursor: initial; outline: none;">
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
