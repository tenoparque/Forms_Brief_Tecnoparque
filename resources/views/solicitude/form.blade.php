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
                    // Construir el nuevo combo box con los servicios obtenidos del controlador
                    var servicesComboBox = '<select name="id_servicios_por_tipo" class="form-control">';
                    $.each(response.services, function (index, service) {
                        servicesComboBox += '<option value="' + service.id + '">' + service.nombre + '</option>';
                    });
                    servicesComboBox += '</select>';
                    // Mostrar el nuevo combo box en el área designada
                    $('#servicesComboBoxContainer').html(servicesComboBox);
                },
                error: function (xhr) {
                    console.error('Error al obtener los servicios asociados al tipo de solicitud.');
                }
            });
        });
    });
</script>
    
</div>

