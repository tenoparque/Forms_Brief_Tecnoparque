@extends('layouts.app')

@section('template_title')
    Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    
                    <div class="card-body">
                        
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center;">
                                <div class="d-flex mt-3 mb-4">
                                    <div >
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('SOLICITUDES') }}</h1>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row mb-3"style="padding-bottom:2px; margin;margin-block-start: 50px">
                                <div class="check__radio-solici">
                                    <label class=" checkboxSol check__label-solici"><input  class="checkboxSolInp "  type="radio" name="parametro" value="tipo"><span class="check"><span class="inner-eye"></span></span> Tipo de Solicitud</label>
                                    <label class=" checkboxSol check__label-solici"><input   class="checkboxSolInp" type="radio" name="parametro" value="nodo"><span class="check"><span class="inner-eye"></span></span>  Nodo</label> 
                                    <label class=" checkboxSol check__label-solici"><input  class="checkboxSolInp"  type="radio" name="parametro" value="evento"><span class="check"><span class="inner-eye"></span></span>  Evento</label>
                                    <label class=" checkboxSol check__label-solici"><input  class="checkboxSolInp"  type="radio" name="parametro" value="estado"><span class="check"><span class="inner-eye"></span></span>  Estado</label>
                                    <label class=" checkboxSol  check__label-solici"><input  class="checkboxSolInp"  type="radio" name="parametro" value="designer"><span class="check"><span class="inner-eye"></span></span> Diseñador</label>
                                    <label class=" checkboxSol check__label-solici"><input  class="checkboxSolInp"  type="radio" name="parametro" value="usuario"><span class="check"><span class="inner-eye"></span></span>  Usuario Creador</label> 
                                </div>
                            </div>
                        
                        </div>
                        <div class="card-header">
                            <div class="row mb-3">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <input class="form-control" id="search" placeholder="Ingrese el tipo de solicitud..."
                                        style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                    <a href="{{route('solicitudes.pdf')}}" class="btnpdf" target="_blank"><i class="fa-solid fa-file-pdf fa-2xl" style="color: #642c78;"></i></a>
                                    <a href="{{ route('solicitudes.create') }}" class="btnCrear">{{ __('CREAR') }}
                                        <i class="fa-solid fa-circle-play iconDCR"></i></a>
                                </div>                               
                            </div>
                            <div style="margin-bottom: 20px" id="valor-actualizado">
                                {{-- Acá se cargará el contador en tiempo real de las solicitudes y el historial de las modificaciones  --}}
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

                                            <td   id="buttoncell" class="celda__opc-solici">
                                                <a   href="{{ route('solicitudes.show', $solicitude->id) }}"
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
                                                    <i class="fa-solid fa-clone fa-xs" style="color: #642c78;"></i>
                                                    {{ __('Duplicar') }}
                                                    
                                                </a>

                                                <button  class="btnAsignar"
                                                    onclick="abrirModalAsignacion({{ $solicitude->id }})">
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

                        <!-- Modal para mostrar la asignación de una solicitud un diseñador -->
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
                                            <select name="id_user" id="id_user" class="form-control selectpicker"
                                                data-style="btn-primary" title="Seleccionar diseñador" required
                                                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 10px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                                                <option value="" disabled selected>Seleccionar diseñador...</option>
                                                @foreach ($usuariosDesigner as $user)
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
                                        <button type="button" class="btnModificar cerrar-modal"
                                            onclick="cerrarModalAsignacion()">
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
                </div>
                {!! $solicitudes->links() !!}
            </div>
        </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $('input[name="parametro"]').change(function() {
    // Obtener el valor seleccionado del radio button
    $parametro = $(this).val();
    //console.log(parametro);
    // Realizar la búsqueda con el parámetro seleccionado
    $('#search').attr('placeholder', 'Ingrese el ' + parametro + '...');
});

            // javascript and ajax code
            $('#search').on('keyup', function() {
                $value = $(this).val();
                console.log($value);
                if ($value) {
                    $('.alldata').hide();
                    $('.dataSearched').show();
                } else {
                    $('.alldata').show();
                    $('.dataSearched').hide();
                }
                $parametro = $('input[name="parametro"]:checked').val();
                console.log($parametro);
                $.ajax({
                    type: 'get',
                    url: "{{ URL::to('searchSolicitude') }}",
                    data: {
                        'search': $value,
                        'valor': $parametro
                    },

                    success: function(data) {
                        $('#Content').html(data);
                    }
                });
            })
        </script>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </section>

    <form id="asignacionForm" action="{{ route('solicitudes.asignar') }}" method="POST">
        @csrf
        <input type="hidden" name="solicitud_id" id="solicitud_id">
        <input type="hidden" name="usuario_id" id="usuario_id">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
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
                        document.getElementById('valor-actualizado').textContent = "Número Total de Solicitudes Recibidas " + respuesta.campoValor;
                    } else {
                        console.error('Error en la solicitud: ' + xhr
                            .status); // Imprimir el estado del error en la consola
                    }
                }
            };

            // Enviar la solicitud con un cuerpo vacío
            xhr.send();
        }

        // Llamar a la función hacerSolicitud cada cierto tiempo (por ejemplo, cada 5 segundos)
        setInterval(hacerSolicitud, 1000); // 5000 milisegundos = 5 segundos

        function abrirModalAsignacion(idSolicitud) {
            // Mostrar el modal de asignación de diseñador
            $('#asignacionModal').modal('show');
            // Establecer el ID de la solicitud en el campo oculto del formulario
            $('#solicitud_id').val(idSolicitud);
        }

        function guardarAsignacion() {
            // Obtener el ID del usuario seleccionado
            var usuarioId = $('#id_user').val();
            // Establecer el ID del usuario en el campo oculto del formulario
            $('#usuario_id').val(usuarioId);
            // Enviar el formulario
            $('#asignacionForm').submit();
        }

        function cerrarModalAsignacion() {
            // Restablecer el valor predeterminado del select
            $('#id_user').prop('selectedIndex', 0);

            // Ocultar el modal de asignación de diseñador
            $('#asignacionModal').modal('hide');
        }
    </script>
@endsection
