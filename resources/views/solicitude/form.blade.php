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
            <select name="id_servicios_por_tipo" id="id_servicios_por_tipo" class="form-control">
                <!-- Las opciones de los servicios se llenarán dinámicamente aquí -->
            </select>
        </div>

         <!-- Combo box para los datos únicos por solicitudes -->
         <div class="form-group" id="datosUnicosComboBoxContainer">
            <label for="id_datos_unicos_por_solicitud">Datos Únicos por Solicitud</label>
            <select name="id_datos_unicos_por_solicitud" id="id_datos_unicos_por_solicitud" class="form-control">
                <!-- Las opciones de los datos únicos por solicitudes se llenarán dinámicamente aquí -->
            </select>
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
                // Construir el nuevo combo box con los datos únicos por solicitudes obtenidos del controlador
                var datosUnicosComboBox = '<select name="id_datos_unicos_por_solicitud" class="form-control">';
                $.each(response.datos_unicos, function (index, datoUnico) {
                    datosUnicosComboBox += '<option value="' + datoUnico.id + '">' + datoUnico.nombre + '</option>';
                });
                datosUnicosComboBox += '</select>';
                // Mostrar el nuevo combo box en el área designada
                $('#datosUnicosComboBoxContainer').html(datosUnicosComboBox);

                // Construir el nuevo combo box con los servicios por solicitud obtenidos del controlador
                var serviciosComboBox = '<select name="id_servicios_por_tipo" class="form-control">';
                $.each(response.servicios, function (index, servicio) {
                    serviciosComboBox += '<option value="' + servicio.id + '">' + servicio.nombre + '</option>';
                });
                serviciosComboBox += '</select>';
                // Mostrar el nuevo combo box en el área designada
                $('#servicesComboBoxContainer').html(serviciosComboBox);
            },
            error: function (xhr) {
                console.error('Error al obtener los datos asociados al tipo de solicitud.');
            }
        });
    });
});
</script>
    
</div>

