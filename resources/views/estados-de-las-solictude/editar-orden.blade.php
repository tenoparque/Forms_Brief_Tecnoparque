@extends('layouts.app')


@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <form id="editarOrdenForm" action="{{ route('estados-de-las-solictudes.actualizar-orden') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive"  style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">

                        <table class="table table-bordered table-hover"
                           >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Orden Mostrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estadosDeLasSolictudes as $estado)
                                    <tr>
                                        <td>{{ $estado->nombre }}</td>
                                        <td>
                                            <select name="orden_mostrado[{{ $estado->id }}]" class="orden-mostrado" required>
                                                @for ($i = 1; $i <= count($estadosDeLasSolictudes); $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $estado->orden_mostrado == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="box-footer" style="text-align: right;margin-right:3%;">
                <button type="submit" class="btnGuardar" >Guardar</button>
            </div>
        </form>
    </section>

    {{-- jquery is imported --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- A javascript script is used to validate that the same orden mostrado cannot be chosen twice. --}}
    <script>
        $(document).ready(function() {
            $('#editarOrdenForm').submit(function(event) {
                var ordenesMostrados = []; // Almacenar los valores de orden mostrado

                $('.orden-mostrado').each(function() {
                    ordenesMostrados.push($(this)
                .val()); // Obtener el valor de cada campo de orden mostrado
                });

                var uniqueOrdenesMostrados = [...new Set(ordenesMostrados)]; // Eliminar duplicados

                if (ordenesMostrados.length !== uniqueOrdenesMostrados.length) {
                    alert('No puedes seleccionar el mismo orden mostrado más de una vez.');
                    event.preventDefault(); // Evitar el envío del formulario
                }
            });
        });
    </script>
@endsection
