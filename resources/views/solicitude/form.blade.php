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
                    <div class="form-group col-md-12 my-3">
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
                        <div class="form-group col-md-12 my-3">
                            <label style="font-size: 18px; font-weight: bold;">CATEGORIAS DE EVENTOS ESPECIALES</label>
                            <div style="position: relative">
                                <select name="id_categoria_evento" id="id_categoria_evento"
                                    class="form-control selectpicker" data-style="btn-primary"
                                    style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                    title="Seleccionar la Categoria Del Evento Especial" required>
                                    <option value="">Seleccione una categoria de evento especial</option>
                                    <!-- Opción "No aplica" -->
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
                        </div>
                        <div class="form-group my-2">
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
                        </div>


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
                            </div>

                        </div>

                        <br>

                        <div class=" form-group my-2">
                            <h5>Datos Únicos por Solicitud</h5>
                            <div id="datosUnicosComboBoxContainer" class="row">

                                <!-- Los textboxes se llenarán dinámicamente aquí -->
                            </div>
                            {{-- boton para abrir el modal --}}

                            <br>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#qrModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                                    <path d="M2 2h2v2H2z" />
                                    <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z" />
                                    <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z" />
                                    <path
                                        d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z" />
                                    <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z" />
                                </svg>
                            </button>

                            <button type="button" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path
                                        d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                    <path
                                        d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                                </svg>
                            </button>

                            {{-- modal --}}
                            <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrModalLabel">Código QR</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{-- Mostrar el código QR solo si la política está presente --}}
                                            @if ($politicas)
                                                <img src="data:image/png;base64,{{ base64_encode($politicas->qr) }}"
                                                    class="" alt="QR Code" style="width: 3in; height: 3in;">
                                            @else
                                                <p>No hay registro de política con id_estado = 1</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" id="tipo_solicitud_id" name="tipo_solicitud_id">
                            <input type="hidden" id="id_evento_especial" name="id_evento_especial">
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
</script>

<script>
    $(document).ready(function() {
        $('#id_tipos_de_solicitudes').change(function() {
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
</script>

<script>
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
                // Si hay subservicios preseleccionados, seleccionarlos y activar el evento de cambio
                @if (isset($idSubservicios) && count($idSubservicios) > 0)
                    var idSubservicios = {{ json_encode($idSubservicios) }};
                    idSubservicios.forEach(function(idSubservicio) {
                        var checkbox = $('input[type="checkbox"][value="' + idSubservicio + '"]');
                        checkbox.prop('checked', true);

                        manejarCambioServicios.call(checkbox.get(0));
                    });
                @endif

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
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="date" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; " placeholder="" min="${getTodayDatePlus10Days()}"></div>`;
                    } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'link') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="url" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px;" placeholder=""></div>`;
                    } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'numero') {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label class="LabelText"  style="font-size: 16px; font-weight: bold; ">${datoUnico.nombre}</label><input type="number" name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; " placeholder=""></div>`;
                    } else {
                        textBoxHtml =
                            `<div class="solicitudesDivText"><label  class="LabelText" style="max-width: 100%; overflow: hidden; word-wrap: break-word;font-size: 16px; font-weight: bold;">${datoUnico.nombre}</label><input type="text" style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; " name="datos_unicos_por_solicitud_${datoUnico.id}" class="form-control InputText" placeholder=""></div>`;
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
                tipo_evento_id: selectedTypeId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                var eventosOptions = '<option value="">Seleccionar evento...</option>';
                $.each(response.evento, function(index, eventosAsociados) {
                    eventosOptions += '<option value="' + eventosAsociados.id + '">' +
                        eventosAsociados.nombre + '</option>';
                });
                $('#eventosComboBoxContainer').html(
                    '<select class="form-control" name="evento_asociado">' + eventosOptions +
                    '</select>');

                @if (isset($id_evento_especial))
                    var idEventoEspecial = {{ $id_evento_especial }};
                    $('#eventosComboBoxContainer').val(idEventoEspecial)
                        .change(); // Agrega .change() para disparar el evento change
                @endif
            },
            error: function(xhr) {
                console.error(
                    'Error al obtener los datos asociados al tipo de solicitud.');
            }
        });
    });
    $('#id_categoria_evento').change(function() {
        var selectedOption = $(this).val(); // Obtener el valor seleccionado
        console.log('ID de la categoria seleccionado:', selectedOption);


    });

    $('#eventosComboBoxContainer').change(function() {
        var selectedEvent = $(this).val(); // Obtain the selected ID
        $('#id_evento_especial').val(selectedEvent);






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
