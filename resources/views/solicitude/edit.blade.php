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
                        <div class="float-right" id="btnGroupAgregar">
                            <button class="btn btn-primary" id="btnAgregarModificacion">
                                {{ __('Agregar Modificación') }}
                            </button>
                        </div>
                        <div class="float-right" id="btnGroupCancelarEnviar" style="display: none;">
                            <button class="btn btn-secondary mr-2" id="btnCancelar">
                                {{ __('Cancelar') }}
                            </button>
                            <button type="submit" class="btn btn-success" id="btnEnviarModificacion">
                                {{ __('Enviar Modificación') }}
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div id="comboboxEstado" style="display: none;">
                            <h3>Estado de la Solicitud</h3>
                            <select name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar el estado de la solicitud" required>
                                <option value="" disabled selected>Seleccionar Estado de la Solicitud...</option>
                                @foreach ($estadosDeLaSolicitudes as $estadoDeLaSolicitud)
                                    <option value="{{ $estadoDeLaSolicitud->id }}"
                                        {{ ($solicitude->id_estado_de_la_solicitud ?? '') == $estadoDeLaSolicitud->id ? 'selected' : '' }}>
                                        {{ $estadoDeLaSolicitud->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div id="campoTexto" style="display: none;">
                            <div class="form-group">
                                <label for="modificacion">Modificación:</label>
                                <textarea class="form-control" id="modificacion" name="modificacion" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="table-responsive">
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
                <div>
                    <a href="{{ route('solicitudes.index') }}" class="btnDCR"
                       >
                        {{ __('REGRESAR') }}
                        <i class="fa-solid fa-circle-play fa-flip-both iconDCR" ></i>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <form id="formEnviarModificacion" method="POST" action="{{ route('solicitudes.update', $solicitude->id) }}" style="display: none;">
        @csrf
        @method('PUT')
        <input type="hidden" name="modificacion" id="modificacionInput">
        <input type="hidden" name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud_input">

    </form>

    <script>
        document.getElementById('btnAgregarModificacion').addEventListener('click', function() {
            document.getElementById('campoTexto').style.display = 'block';
            document.getElementById('comboboxEstado').style.display = 'block';
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

             // Obtener el valor seleccionado del combobox
            var selectedEstadoId = $('#id_estado_de_la_solicitud').val();
            
            // Obtener el valor actual del combobox oculto
            var currentEstadoId = $('#id_estado_de_la_solicitud_input').val();

            // Verificar si ha habido un cambio en la selección
            if (selectedEstadoId !== currentEstadoId) {
                // Asignar el nuevo valor al campo oculto
                $('#id_estado_de_la_solicitud_input').val(selectedEstadoId);
            }

            // Verificar si se ha seleccionado un estado
            if (!selectedEstadoId) {
                // Mostrar un mensaje de error o tomar otra acción apropiada
                alert('Por favor, selecciona un estado de la solicitud.');
                return; // Detener el envío del formulario
            }

            // Asignar el valor de la modificación al campo oculto
            document.getElementById('modificacionInput').value = modificacion;
            document.getElementById('modificacionInput').value = modificacion;
            document.getElementById('formEnviarModificacion').submit();
            });

        $('#id_estado_de_la_solicitud').change(function() {
        var selectedEstadoId = $(this).val();
        $('#id_estado_de_la_solicitud_input').val(selectedEstadoId);
    });

   
    </script>
@endsection
