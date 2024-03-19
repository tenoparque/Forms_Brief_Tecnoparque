@extends('layouts.app')


@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">

        <div style="d-flex justify-content-between align-items-center">
            <div class="d-flex mt-3 mb-4">
                <div>
                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('EDITAR ESTADO ') }}</h1>
                </div>
                <div>
                    <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('DE LA SOLICITUD') }}</h1>
                </div>
            </div>
        </div>
        <form id="editarOrdenForm" action="{{ route('estados-de-las-solictudes.actualizar-orden') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12">

                        @foreach ($estadosDeLasSolictudes as $estado)
                            <label style="font-size: 18px; font-weight: bold; margin-left: 35px" for="id_ciudad">
                                {{ $estado->nombre }}</label>
    
                            <div style="position: relative">
                                <select name="orden_mostrado[{{ $estado->id }}]" class="orden-mostrado form-control" required
                                    style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding:6px 12px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                                    @for ($i = 1; $i <= count($estadosDeLasSolictudes); $i++)
                                        <option value="{{ $i }}"
                                            {{ $estado->orden_mostrado == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <div class="icono" style="right: 4%;">
                                    <div class="circle-play">
                                        <div class="circle"></div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="box-footer" style="text-align: right;margin-right:3%;">
                <button type="submit" class="btnGuardar">Guardar
                    <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i>
                </button>
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
