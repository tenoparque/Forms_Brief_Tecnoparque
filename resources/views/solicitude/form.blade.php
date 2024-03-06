<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="cardh">
                <div class="d-flex">
                    <h2 class="">Formulario thrh </h2>
                    <h2 class="">Brief</h2>
                </div>
                <div class="card-bodyh">
                    <form id="solicitudForm">

                        <div class="form-group">
                            <label for="id_tipos_de_solicitudes">Tipo de Solicitud</label>
                            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes"
                                class="form-control selectpicker" data-style="btn-primary" title="Seleccionar un Tipo de Solicitud" required>
                                <option value="" disabled selected>Seleccionar Tipo de Solicitud...</option>
                                @foreach ($solicitudes as $solicitud)
                                <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_servicios_por_tipo" class="my-2">Servicio</label>
                            <div id="servicesComboBoxContainer" class="row">
                                <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>Datos Únicos por Solicitud</h4>
                            <div  id="datosUnicosComboBoxContainer" class="row">
                                <!-- Los textboxes se llenarán dinámicamente aquí -->
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-4">Enviar Solicitud</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#id_tipos_de_solicitudes').change(function () {
            var selectedTypeId = $(this).val(); // Obtener el ID del tipo de solicitud seleccionado
            // Enviar el ID del tipo de solicitud seleccionado a través de una solicitud AJAX al controlador
            $.ajax({
                url: '{{ route("solicitude.processSelectedId") }}',
                type: 'POST',
                data: {
                    tipo_solicitud_id: selectedTypeId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Construir checkboxes para los servicios por solicitud
                    var serviciosCheckboxes = '';
                    // var checkboxCounter = 0;
                    $.each(response.servicios, function (index, servicio) {
                        // if(checkboxCounter % 2 === 0){
                        //     serviciosCheckboxes += '<br>';
                        // } 
                        serviciosCheckboxes += '<div class="col-xl-6 col-md-6 my-2"><label class="text-start"><input type="checkbox" name="servicios_por_tipo[]" value="' + servicio.id + '"> ' + servicio.nombre + '</label></div>';
                        // checkboxCounter++;

                    });
                    // Mostrar los checkboxes en el área designada
                    $('#servicesComboBoxContainer').html(serviciosCheckboxes);
                    
                    // Construir textboxes para los datos únicos por solicitud
                    var datosUnicosTextboxes = '';
                    

                    $.each(response.datos_unicos, function (index, datoUnico) {
                        
                        datosUnicosTextboxes += '<div class="col-xl-4 col-md-6"><label>' +  ' </label><input type="text" name="datos_unicos_por_solicitud_' + datoUnico.id + '" class="form-control text-start" placeholder="' + datoUnico.nombre + '"></div>';
                    });

                    // Mostrar los textboxes en el área designada
                    $('#datosUnicosComboBoxContainer').html(datosUnicosTextboxes);
                },
                error: function (xhr) {
                    console.error('Error al obtener los datos asociados al tipo de solicitud.');
                }
            });
        });
    });
</script>
