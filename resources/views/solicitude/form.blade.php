
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="id_tipos_de_solicitudes">Tipo de Solicitud</label>
            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar un Tipo de Solicitud" required>
                @foreach ($solicitudes as $solicitud)
                    <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Combo box para los servicios asociados -->
    <div class="form-group" id="servicesComboBoxContainer">
        <label for="id_servicios_por_tipo">Servicio</label>
        <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->
    </div>

    <!-- Textboxes para los datos únicos por solicitudes -->
    <div class="form-group" id="datosUnicosComboBoxContainer">
        <h4>Datos Únicos por Solicitud</h4>
        <!-- Los textboxes se llenarán dinámicamente aquí -->
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
                    $.each(response.servicios, function (index, servicio) {
                        serviciosCheckboxes += '<label><input type="checkbox" name="servicios_por_tipo[]" value="' + servicio.id + '"> ' + servicio.nombre + '</label><br>';
                    });
                    // Mostrar los checkboxes en el área designada
                    $('#servicesComboBoxContainer').html(serviciosCheckboxes);
                    
                    // Construir textboxes para los datos únicos por solicitud
                    var datosUnicosTextboxes = '';
                    

                    $.each(response.datos_unicos, function (index, datoUnico) {
                        datosUnicosTextboxes += '<div class="form-group">';
                        datosUnicosTextboxes += '<div class="row">';
                        datosUnicosTextboxes += '<div class="col-12 col-md-6">';
                        datosUnicosTextboxes += '<label>' + datoUnico.nombre + '</label>';
                        datosUnicosTextboxes += '</div>';
                        datosUnicosTextboxes += '<div class="col-12 col-md-6">';
                        datosUnicosTextboxes += '<input type="text" name="datos_unicos_por_solicitud_' + datoUnico.id + '" class="form-control" placeholder="' + datoUnico.nombre + '">';
                        datosUnicosTextboxes += '</div>';
                        datosUnicosTextboxes += '</div>';
                        datosUnicosTextboxes += '</div>';
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
