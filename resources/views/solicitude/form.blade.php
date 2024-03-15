<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<div class="container shadow-none p-3 bg-body-tertiary rounded ">
    <div class="row m-3">
        <div class="">
            <div class="">
                <h2 class="primeraPalabraFlex mb-0" style="font-size: 200%"> FORMULARIO </h2>
                <h2 class="segundaPalabraFlex" style="font-size: 200%"> BRIEF</h2>
                
            </div>
            <div class="">
                <form id="solicitudForm" class="formBrief">

                    <br>
                        <div class="form-group col-md-4 my-3">
                            <h5 for="id_tipos_de_solicitudes">Tipo de Solicitud</h5>
                            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes"
                                class="form-control selectpicker" data-style="btn-primary"
                                title="Seleccionar un Tipo de Solicitud" required>
                                <option value="" selected>Seleccionar Tipo de Solicitud...</option>
                                @foreach ($solicitudes as $solicitud)
                                    <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    <br>

                    <div id="btnEnviarSolicitud">
                        <div class="form-group col-md-4 my-3">
                            <label>CATEGORIAS DE EVENTOS ESPECIALES</label>
                            <select name="id_categoria_evento" id="id_categoria_evento" 
                            class="form-control selectpicker" data-style="btn-primary" title="Seleccionar la Categoria Del Evento Especial" required>
                                <option value="">Seleccione una categoria de evento especial</option> <!-- Opción "No aplica" -->
                                @foreach ($categoriaEventos as $eventos)
                                
                                        <option value="{{ $eventos->id }}">{{ $eventos->nombre }}</option>
                                
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <h5>eventos</h5>
                            <select name="eventosComboBoxContainer" id="eventosComboBoxContainer" 
                            class="form-control selectpicker" data-style="btn-primary" title="Seleccionar la Categoria Del Evento Especial" required>
                            
                                <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->

                            </select>
                        </div>
    
                        
                        <div class="form-group my-2">
                            <h5>Servicios</h5>
                            <div id="servicesComboBoxContainer" class="row">
                                <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-qr-code" viewBox="0 0 16 16">
                                    <path d="M2 2h2v2H2z" />
                                    <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z" />
                                    <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z" />
                                    <path
                                        d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z" />
                                    <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z" />
                                </svg>
                            </button>
    
                            <button type="button" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-link-45deg" viewBox="0 0 16 16">
                                    <path
                                        d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                                    <path
                                        d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                                </svg>
                            </button>
    
                            {{-- modal --}}
                            <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrModalLabel">Código QR</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body" style="margin-left: 20%; margin-block-end: 5%">
                                            {{-- Mostrar el código QR solo si la política está presente --}}
                                            @if ($politicas)
                                                <img src="data:image/png;base64,{{ base64_encode($politicas->qr) }}" class="" alt="QR Code">
                                            @else
                                                <p>No hay registro de política con id_estado = 1</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <input type="hidden" id="tipo_solicitud_id" name="tipo_solicitud_id">
                            <input type="hidden" id="id_evento_especial" name="id_evento_especial">

                        </div>
                        <div class="col-md-12 d-flex justify-content-end buttomBriefDiv">
                            <button type="submit" class="btn btn-outline btnCED my-4">Enviar Solicitud <i
                                    class="fa-solid fa-circle-play iconCDE" ></i></button>
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
        $('#id_tipos_de_solicitudes').change(function() {
            var selectedTypeId = $(this).val(); 
            $.ajax({
                url: '{{ route('solicitude.processSelectedId') }}',
                type: 'POST',
                data: {
                    tipo_solicitud_id: selectedTypeId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var serviciosCheckboxes = '';
                    $.each(response.servicios, function(index, servicio) {
                        serviciosCheckboxes +=
                            '<div class=" col-xl-6 col-lg-6 col-md-6 my-2"><label class=" checkboxSol"><input type="checkbox" class="checkboxSolInp"  name="servicios_por_tipo[]" value="' +
                            servicio.id +
                            '"> <span class="check"><span class="inner-eye"></span></span> ' +
                            servicio.nombre +
                            '</label></div>';
                    });
                    $('#servicesComboBoxContainer').html(serviciosCheckboxes);

                    var datosUnicosTextboxes = '';
                    $.each(response.datos_unicos, function(index, datoUnico) {
                        var tipoDatoId = datoUnico.id_tipos_de_datos;
                        var tipoDato = response.tipos_de_datos.find(function(tipo) {
                            return tipo.id === tipoDatoId;
                        });

                        if (tipoDato && tipoDato.nombre.toLowerCase() === 'fecha') {
                            datosUnicosTextboxes +=
                                '<div class="solicitudesDivText col-xl-4 col-md-4"><label class="LabelText">' +
                                datoUnico.nombre + '</label><input type="date" name="datos_unicos_por_solicitud_' +
                                datoUnico.id +
                                '" class="form-control  InputText" placeholder="" min="' + getTodayDatePlus10Days() + '"></div>';
                        } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'link') {
                            datosUnicosTextboxes +=
                                '<div class="solicitudesDivText col-xl-4 col-md-4"><label class="LabelText">' +
                                datoUnico.nombre + '</label><input type="url" name="datos_unicos_por_solicitud_' +
                                datoUnico.id +
                                '" class="form-control  InputText" placeholder=""></div>';
                        } else if (tipoDato && tipoDato.nombre.toLowerCase() === 'numero') {
                            datosUnicosTextboxes +=
                                '<div class="solicitudesDivText col-xl-4 col-md-4"><label class="LabelText">' +
                                datoUnico.nombre + '</label><input type="number" name="datos_unicos_por_solicitud_' +
                                datoUnico.id +
                                '" class="form-control  InputText" placeholder=""></div>';
                        } else {
                            datosUnicosTextboxes +=
                                '<div class="solicitudesDivText col-xl-4 col-md-4"><label class="LabelText">' +
                                datoUnico.nombre + '</label><input type="text" name="datos_unicos_por_solicitud_' +
                                datoUnico.id +
                                '" class="form-control  InputText" placeholder=""></div>';
                        }
                    });

                    $('#datosUnicosComboBoxContainer').html(datosUnicosTextboxes);
                },
                error: function(xhr) {
                    console.error(
                        'Error al obtener los datos asociados al tipo de solicitud.');
                }
            });
        });
    });

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
 $('#id_tipos_de_solicitudes').change(function() {
            var selectedOption = $(this).val(); // Obtener el valor seleccionado

            // Verificar si la opción seleccionada es diferente de "Seleccionar Tipo de Solicitud..."
            if (selectedOption !== '') {
                // Mostrar el botón de enviar solicitud
                $('#btnEnviarSolicitud').show();
            } else {
                // Ocultar el botón de enviar solicitud
                $('#btnEnviarSolicitud').hide();
            }
        });



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
                        eventosOptions += '<option value="' + eventosAsociados.id + '">' + eventosAsociados.nombre + '</option>';
                    });
                    $('#eventosComboBoxContainer').html('<select class="form-control" name="evento_asociado">' + eventosOptions + '</select>');
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
        display: none; /* Por defecto, el botón está oculto */
    }
</style>
