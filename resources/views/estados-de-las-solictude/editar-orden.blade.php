<form id="editarOrdenForm" action="{{ route('estados-de-las-solictudes.actualizar-orden') }}" method="POST">
    @csrf
    @method('PUT')

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Orden Mostrado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estadosDeLasSolictudes as $estado)
                <tr>
                    <td>{{ $estado->nombre }}</td>
                    <td>
                        <input type="number" name="orden_mostrado[{{ $estado->id }}]" class="orden-mostrado" value="{{ $estado->orden_mostrado }}" required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit">Guardar</button>
</form>

{{-- jquery is imported --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- A javascript script is used to validate that the same orden mostrado cannot be chosen twice. --}}
<script>
    $(document).ready(function() {
        $('#editarOrdenForm').submit(function(event) {
            var ordenesMostrados = []; // Almacenar los valores de orden mostrado

            $('.orden-mostrado').each(function() {
                ordenesMostrados.push($(this).val()); // Obtener el valor de cada campo de orden mostrado
            });

            var uniqueOrdenesMostrados = [...new Set(ordenesMostrados)]; // Eliminar duplicados

            if (ordenesMostrados.length !== uniqueOrdenesMostrados.length) {
                alert('No puedes seleccionar el mismo orden mostrado más de una vez.');
                event.preventDefault(); // Evitar el envío del formulario
            }
        });
    });
</script>