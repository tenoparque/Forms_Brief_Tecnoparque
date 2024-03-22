@extends('layouts.app')

@section('template_title')
    Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('SOLICITUDES') }}</h1>
                                    </div>
                                </div>
                            </div>

                            <div id="valor-actualizado">
                                {{-- Acá se cargará el contador en tiempo real de las solicitudes y el historial de las modificaciones  --}}

                            </div>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search" placeholder="xxx..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('solicitudes.create') }}" class="btnCrear">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play iconDCR"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>No</th>
                                        <th>Tipo De Solicitud</th>
                                        <th>Fecha Y Hora</th>
                                        <th>Nodo</th>
                                        <th>Usuario</th>
                                        <th>Evento</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($solicitudes as $solicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $solicitude->tiposdesolicitude->nombre }}</td>
                                            <td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                                            <td>{{ $solicitude->user->nodo->nombre }}</td>
                                            <td>{{ $solicitude->user->name }}</td>
                                            <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                            <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>

                                            <td id="buttoncell">
                                                <a href="{{ route('solicitudes.show', $solicitude->id) }}"
                                                    class="btnDetalle">
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"></i>
                                                    {{ __('Detalle') }}

                                                </a>

                                                <a href="{{ route('solicitudes.edit', $solicitude->id) }}"
                                                    class="btnModificar">
                                                    <i class="fa-solid fa-pen-to-square fa-xs iconEdit"></i>
                                                    {{ __('Modificar') }}

                                                </a>

                                                <a href="{{ route('solicitudes.duplicarFormulario', $solicitude->id) }}"
                                                    class="btnDuplicar">
                                                    {{ __('Duplicar') }}
                                                    <i class="fa-solid fa-clone fa-xs" style="color: #642c78;"></i>
                                                </a>
                                               
                                                <button class="btnAsignar" onclick="abrirModalAsignacion({{ $solicitude->id }})" data-toggle="modal" data-target="#asignacionModal">
                                                    <i class="fa-solid fa-user-plus" style="color: #642c78;"></i>
                                                    {{ __('Asignar a diseñador') }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>


                        
                       <!-- Modal para mostrar la asiganción de una solicitud un diseñador-->
<div class="modal fade" id="asignacionModal" tabindex="-1" role="dialog" aria-labelledby="historialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="margin-left: 60px; position: relative; color: #00324D" class="modal-title" id="historialModalLabel">ASIGNAR SOLICITUD A UN DISEÑADOR</h5>
            </div>
            <div class="modal-body">
                <div style="position: relative;">
                    <select name="id_user" id="id_user" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar diseñador" required style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 10px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar diseñador...</option>
                        @foreach ($usuarios as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%;">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal">
                    {{ __('Cerrar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                </button>
                <!-- Botón para guardar la asignación -->
                <button type="button" class="btnGuardar" onclick="guardarAsignacion()">
                    {{ __('Guardar') }} <i class="fa-solid fa-save fa-sm iconDCR"></i>
                </button>
            </div>
            
        </div>
    </div>
</div>


                    </div>




                        <!-- Modal para mostrar la asiganción de una solicitud un diseñador-->
                        <!-- Modal para mostrar la asiganción de una solicitud un diseñador-->
                        <div class="modal fade" id="asignacionModal" tabindex="-1" role="dialog"
                            aria-labelledby="historialModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="margin-left: 60px; position: relative; color: #00324D"
                                            class="modal-title" id="historialModalLabel">ASIGNAR SOLICITUD A UN DISEÑADOR
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div style="position: relative;">
                                            <select name="id_ciudad" id="id_ciudad" class="form-control selectpicker"
                                                data-style="btn-primary" title="Seleccionar diseñador" required
                                                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 10px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                                                <option value="" disabled selected>Seleccionar diseñador...</option>
                                                @foreach ($usuarios as $user)
                                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="icono" style="right: 4%;">
                                                <div class="circle-play">
                                                    <div class="circle"></div>
                                                    <div class="triangle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btnModificar cerrar-modal" data-dismiss="modal">
                                            {{ __('Cerrar') }} <i class="fa-solid fa-circle-xmark fa-sm iconDCR"></i>
                                        </button>
                                        <!-- Agregar el botón de guardar aquí -->
                                        <button type="button" class="btnGuardar">
                                            {{ __('Guardar') }} <i class="fa-solid fa-save fa-sm iconDCR"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </body>
                </div>
                {!! $solicitudes->links() !!}
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>

            // Agrega un evento click al botón "Ver Asignación"
            document.getElementById('btnVerAsignacion').addEventListener('click', function() {
                // Abre el modal cuando se haga clic en el botón
                $('#asignacionModal').modal('show');
            });

            // Agrega un evento click a todos los botones de clase "cerrar-modal"
            document.querySelectorAll('.cerrar-modal').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Cierra el modal cuando se haga clic en el botón
                    $('#asignacionModal').modal('hide');
                });
            });


            function hacerSolicitud() {
                var xhr = new XMLHttpRequest(); // Crear un nuevo objeto XMLHttpRequest
                // Configurar la solicitud
                xhr.open("GET", "{{ 'procesarValor' }}", true);
                // Manejar la respuesta
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) { // Si la solicitud ha terminado
                        if (xhr.status === 200) { // Si la solicitud ha tenido éxito
                            var respuesta = JSON.parse(xhr.responseText); // Parsear la respuesta JSON
                            console.log(respuesta.campoValor);

                            // Actualizar el valor en el elemento HTML
                            document.getElementById('valor-actualizado').textContent = "valor " + respuesta.campoValor;
                        } else {
                            console.error('Error en la solicitud: ' + xhr
                            .status); // Imprimir el estado del error en la consola
                        }
                    }
                };;

                // Enviar la solicitud con un cuerpo vacío
                xhr.send();
            }

            // Llamar a la función hacerSolicitud cada cierto tiempo (por ejemplo, cada 5 segundos)
            setInterval(hacerSolicitud, 1000); // 5000 milisegundos = 5 segundos
        </script>

<script>
    // Variable para almacenar el ID de la solicitud
    let solicitudId;

    // Función para abrir el modal de asignación y guardar el ID de la solicitud
    function abrirModalAsignacion(id) {
        // Guardar el ID de la solicitud
        solicitudId = id;
        // Abrir el modal de asignación
        $('#asignacionModal').modal('show');
    }

   // Definición única de guardarAsignacion()
function guardarAsignacion() {
    // Obtener el ID del diseñador seleccionado
    const designerId = document.getElementById('id_user').value;

    // Si deseas enviar una solicitud AJAX para guardar la asignación, puedes hacerlo aquí
    // Por ejemplo:
    $.ajax({
         type: 'POST',
         url: '{{ route('solicitudes.asignar') }}',
         data: {
             solicitudId: solicitudId,
             designerId: designerId
         },
         success: function(response) {
             // Manejar la respuesta del servidor si es necesario
             console.log('Asignación guardada correctamente.');
         },
         error: function(xhr, status, error) {
             // Manejar errores si es necesario
             console.error('Error al guardar la asignación:', error);
         }
     });

    // Aquí puedes incluir cualquier otra lógica que necesites para guardar la asignación

    // Mostrar en consola los IDs de la solicitud y del diseñador seleccionado
    console.log('ID de la solicitud:', solicitudId);
    console.log('ID del diseñador seleccionado:', designerId);

    // Cerrar el modal de asignación
    $('#asignacionModal').modal('hide');
}

</script>

         
              
        

    @endsection
