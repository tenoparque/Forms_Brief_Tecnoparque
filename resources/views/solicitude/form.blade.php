<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<div class="container shadow-none p-3 bg-body-tertiary rounded ">
    <div class="row m-3">
        <div class="">
            <div class="d-flex">
                <h2 class="primeraPalabraFlex mb-0" style="font-size: 200%; font-weight: 900;"> FORMULARIO </h2>
                <h2 class="segundaPalabraFlex" style="font-size: 200%; font-weight: 900;"> BRIEF</h2>

            </div>
            <div class="">
                <form id="solicitudForm" class="formBrief">

                    <br>
                    <div class="form-group col-md-12 my-2">
                        <h5 for="id_tipos_de_solicitudes" style="font-size: 18px; font-weight: bold;">Tipo de Solicitud
                        </h5>
                        <div style="position: relative">
                            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes"
                                class="form-control selectpicker" data-style="btn-primary"
                                style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                title="Seleccionarun Tipo de Solicitud" required>
                                <option value="" selected>Seleccionar Tipo de Solicitud...</option>
                                @foreach ($solicitudes as $solicitud)
                                    <@if (isset($tipo_solicitud_id))
                                        <option value="{{ $solicitud->id }}"
                                            {{ $solicitud->id == $tipo_solicitud_id ? 'selected' : '' }}>
                                            {{ $solicitud->nombre }}
                                        </option>
                                    @else
                                        <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="icono" style="right: 1%;">
                                <div class="circle-play">
                                    <div class="circle"></div>
                                    <div class="triangle"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br>

                    <div id="btnEnviarSolicitud">
                        <div style="position: relative">
                            <select name="id_categorias_eventos_especiales" id="id_categoria_evento"
                                class="form-control selectpicker" data-style="btn-primary"
                                style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                title="Seleccionar la Categoria Del Evento Especial" required>
                                <option value="">Seleccione una categoria de evento especial</option>
                                @foreach ($categoriaEventos as $eventos)
                                    <option value="{{ $eventos->id }}">{{ $eventos->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="icono" style="right: 1%;">
                                <div class="circle-play">
                                    <div class="circle"></div>
                                    <div class="triangle"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group my-2">
                            <h5>eventos</h5>
                            <div style="position: relative">
                                <select name="eventosComboBoxContainer" id="eventosComboBoxContainer"
                                    class="form-control selectpicker" data-style="btn-primary"
                                    style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                    title="Seleccionar la Categoria Del Evento Especial" required>

                                    <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->

                                </select>
                                <div class="icono" style="right: 1%;">
                                    <div class="circle-play">
                                        <div class="circle"></div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="form-group my-2">
                            <h5 style="font-size: 18px; font-weight: bold; ">Servicios</h5>
                            <div id="servicesComboBoxContainer" class="row">
                                <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->
                            </div>
                            <div class="form-group col-md-12 my-3 otroServicioTextbox" style="display: none;">

                                <label for="otroServicio" style="font-size: 18px; font-weight: bold;">Especificar otro
                                    servicio:</label>
                                <input type="text" id="otroServicio" name="otroServicio" class="form-control"
                                    style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; ">

                                @if (isset($elementoConOtroServicio))
                                    <!-- Agregar valor recibido al campo -->
                                    <script>
                                        // Asignar el valor al campo visible otroServicio
                                        document.getElementById('otroServicio').value = "{{ $elementoConOtroServicio }}";

                                        // Actualizar el valor del campo oculto otroServicioHidden
                                        $('#otroServicioHidden').val("{{ $elementoConOtroServicio }}");
                                    </script>
                                @endif
                            </div>

                            <br>

                            @if (auth()->user()->hasRole('Super Admin'))
                                <div class="col-md-4">
                                    {{ Form::label('nodo', null, ['style' => 'font-size: 16px;  color: ; font-weight: bold']) }}
                                    <div style="position: relative;">
                                        {{ Form::select('id_nodo', $nodos->pluck('nombre', 'id'), null, ['class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''), 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
                                        <div class="icono" onclick="toggleSelect()">
                                            <div class="circle-play">
                                                <div class="circle"></div>
                                                <div class="triangle"></div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! $errors->first('id_nodo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            @endif
                            <br>

                            <div class=" form-group my-2">
                                <h5>Datos Únicos por Solicitud</h5>
                                <div id="datosUnicosComboBoxContainer" class="row">

                                    <!-- Los textboxes se llenarán dinámicamente aquí -->
                                </div>
                                {{-- boton para abrir el modal --}}

                                <br>
                                <label style="font-size: 16px; font-weight: bold; ">Link Drive Imagenes</label>
                                <input type="url" name="drive_link"
                                    style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; ">

                                <button type="button" class="btn" data-bs-toggle="modal"
                                    style="display: flex; align-items: center; gap: 10px;" data-bs-target="#qrModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M144 144c0-44.2 35.8-80 80-80c31.9 0 59.4 18.6 72.3 45.7c7.6 16 26.7 22.8 42.6 15.2s22.8-26.7 15.2-42.6C331 33.7 281.5 0 224 0C144.5 0 80 64.5 80 144l0 48-16 0c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-192c0-35.3-28.7-64-64-64l-240 0 0-48z" />
                                    </svg>
                                    Politica tratamiento de datos
                                </button>



                                {{-- <button type="button" class="btn"
                                    onclick="window.open('{{ $politicas ? $politicas->link : '#' }}', '_blank')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                        <path
                                            d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                        <path
                                            d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                                    </svg>
                                </button> --}}

                                {{-- modal --}}
                                <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="qrModalLabel">{{ $politicas->titulo }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- Descripción de la política --}}
                                                @if ($politicas)
                                                    <p>{{ $politicas->descripcion }}</p>
                                                    <div class="form-check text-start mt-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="policyAcceptanceCheckbox">
                                                        <label class="form-check-label"
                                                            for="policyAcceptanceCheckbox">
                                                            Acepto los términos de la política de tratamiento de datos.
                                                        </label>
                                                    </div>
                                                @else
                                                    <p>No hay registro de política con id_estado = 1</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>





                                <input type="hidden" id="tipo_solicitud_id" name="tipo_solicitud_id">
                                {{-- <input type="hidden" id="id_evento_especial" name="id_evento_especial"> --}}
                                <input type="hidden" id="otroServicioHidden" name="otroServicioHidden">


                            </div>

                        </div>
                        <div id="boton">
                            <div class="col-md-12 d-flex justify-content-end buttomBriefDiv">
                                <button type="submit" class="btnCED my-4">Enviar Solicitud <i
                                        class="fa-solid fa-circle-play iconCDE"></i></button>
                            </div>
                        </div>


                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var cambioAutomatico = true;
    $(document).ready(function() {

        @if (isset($tipo_solicitud_id))

            // Obtener la ID del tipo de solicitud del controlador
            var tipoId = {{ $tipo_solicitud_id }};

            // Verificar si la ID es válida (diferente de null o undefined)
            if (tipoId !== null && tipoId !== undefined) {
                // Llama a la función con la ID del tipo de solicitud deseado
                obtenerDatosPorTipo(tipoId);
                console.log("El idTipo es: " + tipoId);
            } else {
                console.error("La ID del tipo de solicitud no es válida.");
            }

            // Seleccionar automáticamente el valor del combo de categoría
            var idCategoriaEvento = {{ $id_categoria_evento }};
            $('#id_categoria_evento').val(idCategoriaEvento)
                .change(); // Agrega .change() para disparar el evento change
            console.log("ID de la categoría seleccionada:", idCategoriaEvento);

            $('#btnEnviarSolicitud').show();
        @endif

    });

    $(document).ready(function() {
        $('#id_tipos_de_solicitudes').change(function() {
            cambioAutomatico = false;
            // Limpiar el valor del textbox de otro servicio
            $('#otroServicio').val('');

            // Obtener el valor seleccionado del combo
            var tipoId = $(this).val();

            // Llamar a la función con el valor seleccionado del combo
            obtenerDatosPorTipo(tipoId);
            //No mostrar input otro
            $('.otroServicioTextbox').hide();

        });
    });

    $(document).ready(function() {
        // Manejar el evento de cambio o entrada en el textbox de otro servicio
        $('#otroServicio').on('input', function() {
            // Obtener el valor del campo de texto
            var otroServicioValor = $(this).val();
            console.log(otroServicioValor);

            // Actualizar el valor del campo oculto
            $('#otroServicioHidden').val(otroServicioValor);
        });
    });

    function obtenerDatosPorTipo(tipoIdSeleccionado) {
        $.ajax({
            url: '{{ route('solicitude.processSelectedId') }}',
            type: 'POST',
            data: {
                tipo_solicitud_id: tipoIdSeleccionado,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                var serviciosCheckboxes = '';
                var serviciosSeleccionados = [];
                $.each(response.servicios, function(index, servicio) {
                    serviciosCheckboxes +=
                        '<div class=" col-xl-6 col-lg-6 col-md-6 my-2"><label class=" checkboxSol"><input type="checkbox" class="checkboxSolInp"  name="servicios_por_tipo[]" value="' +
                        servicio.id +
                        '"> <span class="check"><span class="inner-eye"></span></span> ' +
                        servicio.nombre +
                        '</label></div>';
                });
                $('#servicesComboBoxContainer').html(serviciosCheckboxes);

                if (cambioAutomatico === true) {
                    // Si hay subservicios preseleccionados, seleccionarlos y activar el evento de cambio
                    @if (isset($idSubservicios) && count($idSubservicios) > 0)
                        var idSubservicios = {{ json_encode($idSubservicios) }};
                        idSubservicios.forEach(function(idSubservicio) {
                            var checkbox = $('input[type="checkbox"][value="' + idSubservicio +
                                '"]');
                            checkbox.prop('checked', true);

                            manejarCambioServicios.call(checkbox.get(0));
                        });
                    @endif
                }

                // validaciones del boton de enviar -----------------------------------------------------------------------------------------------------------------
                function manejarCambioServicios() {
                    var servicioId = $(this).val(); // Obtener el ID del servicio seleccionado
                    var servicioNombre = $(this).closest('label').text()
                        .trim(); // Obtener el nombre del servicio seleccionado

                    if ($(this).is(':checked')) {
                        // Si el servicio seleccionado es "otro", mostrar el textbox
                        if (servicioNombre.toLowerCase() === 'otro') {
                            $(this).closest('.form-group').find('.otroServicioTextbox').show();
                        }

                        // Agregar el servicio al array si está seleccionado
                        serviciosSeleccionados.push({
                            id: servicioId,
                            nombre: servicioNombre
                        });
                    } else {
                        // Si el servicio deseleccionado es "otro", ocultar el textbox
                        if (servicioNombre.toLowerCase() === 'otro') {
                            $(this).closest('.form-group').find('.otroServicioTextbox').hide();
                        }

                        // Remover el servicio del array si está deseleccionado
                        serviciosSeleccionados = serviciosSeleccionados.filter(function(servicio) {
                            return servicio.id !== servicioId;
                        });
                    }

                    // Imprimir el array de servicios seleccionados en la consola
                    console.log(serviciosSeleccionados.length);



                    if (cambioAutomatico === true) {
                        var otroServicioValor = $('#otroServicio').val();
                        // Actualizar el valor del campo oculto
                        $('#otroServicioHidden').val(otroServicioValor);
                    }

                    // Llamar a la función para validar la aparición del botón de enviar solicitud
                    validarBotonEnviar();
                }

                // Función para validar la aparición del botón de enviar solicitud
                function validarBotonEnviar() {
                    var selectedOption = $('#id_tipos_de_solicitudes')
                        .val(); // Obtener el valor seleccionado

                    // Verificar si la opción seleccionada es diferente de "Seleccionar Tipo de Solicitud..."
                    if (selectedOption !== '' && serviciosSeleccionados.length !== 0) {
                        // Mostrar el botón de enviar solicitud
                        $('#boton').show();
                    } else {
                        // Ocultar el botón de enviar solicitud
                        $('#boton').hide();
                    }
                }

                // Manejar el cambio en la selección de servicios
                // Manejar el cambio en la selección de servicios
                $('#servicesComboBoxContainer').find('input[name="servicios_por_tipo[]"]').change(
                    manejarCambioServicios);


                // Manejar el cambio en la selección del tipo de solicitud
                $('#id_tipos_de_solicitudes').change(validarBotonEnviar);
                //-------------------------------------------------fin de las validaciones del boton de enviar--------------------------------------------------------
                var datosUnicosTextboxes = '';
                $.each(response.datos_unicos, function(index, datoUnico) {
                    var tipoDatoId = datoUnico.id_tipos_de_datos;
                    var tipoDato = response.tipos_de_datos.find(function(tipo) {
                        return tipo.id === tipoDatoId;
                    });

                    // Calcular la longitud del nombre del dato único
                    let labelLength = datoUnico.nombre.length;

                    // Determinar la clase de columna Bootstrap
                    // Si la longitud del nombre es menor que 20, la clase será 'col-md-4', de lo contrario será una cadena vacía

                    let colClass = labelLength < 20 ? 'col-md-4' : '';

                    let textBoxHtml = '';
                    if (tipoDato && tipoDato.nombre.toLowerCase() === 'fecha') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input  type="date" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; " placeholder="" required min="${getTodayDatePlus10Days()}"> <small class="form-text text-muted">${datoUnico.descripcion || ''}</small></div>`;
                    } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'hora') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="time" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px;" placeholder=""required></div><small class="form-text text-muted">${datoUnico.descripcion || ''}</small></div>`;
                    } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'link') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="url" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px;" placeholder=""required></div><small class="form-text text-muted">${datoUnico.descripcion || ''}</small></div>`;
                    } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'numero') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="number" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; " placeholder=""required></div><small class="form-text text-muted">${datoUnico.descripcion || ''}</small></div>`;
                    } else {
                        textBoxHtml =
                            `
                            <div class="solicitudesDivText">
                            <label class="LabelText" style="max-width: 100%; overflow: hidden; word-wrap: break-word; font-size: 16px; font-weight: bold;">
                                ${datoUnico.nombre}
                            </label>
                            <div class="input-group">
                                <input type="text" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" 
                                    style="border-radius: 50px 0 0 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color: #ececec;" 
                                    placeholder="${datoUnico.descripcion || ''}" required> 
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary chatgpt-btn" data-dato-id="${datoUnico.id}" 
                                            style="border-radius: 0 50px 50px 0; background-color: #ececec; border-style: solid; border-width:4px; border-color: #ececec; height: 100%;">
                                        <i class="fas fa-robot" style="font-size: 1.5em; vertical-align: middle;"></i>
                                    </button>
                                </div>
                                    </div>
                        </div>
                        `;
                    }

                    datosUnicosTextboxes += `<div class="${colClass}">${textBoxHtml}</div>`;
                });

                $('#datosUnicosComboBoxContainer').html(datosUnicosTextboxes);

                @if (isset($datosPorSolicitud) && count($datosPorSolicitud) > 0)
                    var datosPorSolicitud = {!! json_encode($datosPorSolicitud) !!};

                    // Asignar los valores de los textboxes basados en los datosPorSolicitud
                    $.each(datosPorSolicitud, function(id, valor) {
                        $('input[name="datos_unicos_por_solicitud_' + id + '"]').val(valor);
                    });
                @endif

            },
            error: function(xhr) {
                console.error(
                    'Error al obtener los datos asociados al tipo de solicitud.');
            }
        });
    }

    // Función para obtener la fecha actual en el formato YYYY-MM-DD
    function getTodayDatePlus10Days() {
        var today = new Date();
        today.setDate(today.getDate() + 10); // Suma 10 días a la fecha actual
        var day = today.getDate();
        var month = today.getMonth() + 1; // Los meses comienzan desde 0
        var year = today.getFullYear();

        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }

        return year + '-' + month + '-' + day;
    }

    // Función para verificar la selección del combobox
    $('#id_tipos_de_solicitudes').change(validacionDelombo);

    function validacionDelombo() {
        var selectedOption = $(this).val(); // Obtener el valor seleccionado

        // Verificar si la opción seleccionada es diferente de "Seleccionar Tipo de Solicitud..."
        if (selectedOption !== '') {
            // Mostrar el botón de enviar solicitud
            $('#btnEnviarSolicitud').show();
        } else {
            // Ocultar el botón de enviar solicitud
            $('#btnEnviarSolicitud').hide();
        }
    };


    $('#id_categoria_evento').change(function() {
        var selectedTypeId = $(this).val();
        $.ajax({
            url: '{{ route('solicitudes.eventos') }}',
            type: 'POST',
            data: {
                id_categorias_eventos_especiales: selectedTypeId, // Nombre correcto para el controlador
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                var eventosOptions = '<option value="">Seleccionar evento...</option>';
                $.each(response.evento, function(index, eventosAsociados) {
                    eventosOptions += '<option value="' + eventosAsociados.id + '">' +
                        eventosAsociados.nombre + '</option>';
                });
                $('#eventosComboBoxContainer').html(
                    '<select class="form-control" name="evento_asociado">' +
                    eventosOptions +
                    '</select>');

                @if (isset($id_evento_especial))
                    var idEventoEspecial = {{ $id_evento_especial }};
                    $('#eventosComboBoxContainer select').val(idEventoEspecial)
                        .change(); // Cambié a select para que funcione correctamente
                @endif
            },
            error: function(xhr) {
                console.error('Error al obtener los datos asociados al tipo de solicitud.');
            }
        });
    });

    // Para verificar el valor seleccionado en la consola
    $('#id_categoria_evento').change(function() {
        var selectedOption = $(this).val();
        console.log('ID de la categoría seleccionada:', selectedOption);
    });


    $('#eventosComboBoxContainer').change(function() {
        var selectedEvent = $(this).val(); // Obtain the selected ID
        $('#id_evento_especial').val(selectedEvent);
    });

    $(document).on('click', '.chatgpt-btn', function() {
        var datoId = $(this).data('dato-id');
        var $input = $('input[name="datos_unicos_por_solicitud_' + datoId + '"]');
        var prompt = $input.val();

        // Deshabilitar el botón mientras se procesa la solicitud
        $(this).prop('disabled', true);

        // Opcional: Mostrar un indicador de carga
        var $icon = $(this).find('i');
        $icon.removeClass('fas fa-robot').addClass('fas fa-spinner fa-spin');

        $.ajax({
            url: "{{ route('openai.complete') }}", // Asegúrate de que esta ruta esté definida
            type: 'POST',
            data: {
                prompt: prompt,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $input.val(data.completion);
            },
            error: function(error) {
                console.error(error);
                alert('Ocurrió un error al obtener la autocompletación.');
            },
            complete: function() {
                // Rehabilitar el botón y restaurar el icono
                $('.chatgpt-btn').prop('disabled', false);
                $icon.removeClass('fas fa-spinner fa-spin').addClass('fas fa-robot');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('policyAcceptanceCheckbox');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                checkbox.disabled = true;
                checkbox.style.backgroundColor = '#d3d3d3'; // Color gris claro
                checkbox.style.cursor = 'not-allowed';
                // Enviar solicitud AJAX para registrar la aceptación de la política
                fetch('{{ route('policy.accept', ['policyId' => $politicas->id]) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            accepted: true
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {

                            $('#policyModal').modal('hide'); // Cerrar la modal
                        } else {
                            alert('Ocurrió un error. Por favor, intenta nuevamente.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });
</script>


<style>
    #btnEnviarSolicitud {
        display: none;
        /* Por defecto, el botón está oculto */
    }
</style>

<style>
    #boton {
        display: none;
        /* Por defecto, el botón está oculto */
    }
</style>
