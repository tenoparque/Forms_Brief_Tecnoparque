@extends('layouts.app')

@section('template_title')
    Datos Unicos Por Solicitude
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
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DATOS ÚNICOS POR') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('TIPO DE SOLICITUD') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-between align-items-center">
                        <input class="form-control" id="search"
                            placeholder="Ingrese el nombre del dato único por tipo de solicitud..."
                            style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                        <a href="{{ route('datos-unicos-por-solicitudes.create') }}" class="btn btn-outline"
                            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; "
                            onmouseover="this.style.backgroundColor='#b2ebf2';"
                            onmouseout="this.style.backgroundColor='#FFFF';">{{ __('CREAR') }}
                            <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                    </div>
                </div>
                <div class="table-responsive"
                    style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6; width=25%">
                    <table class="table table-responsive table-bordered " style="width=25%">
                        <thead class="thead-dark">
                            <tr style="border-width: 2px;width:25%">
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Tipo De Dato</th>
                                <th>Tipo De Solicitud</th>
                                <th>Estado</th>

                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($datosUnicosPorSolicitudes as $datosUnicosPorSolicitude)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $datosUnicosPorSolicitude->nombre }}</td>
                                    <td>{{ $datosUnicosPorSolicitude->tiposDeDato->nombre }}</td>
                                    <td>
                                        <p>{{ $datosUnicosPorSolicitude->tiposDeSolicitude->nombre }}</p>
                                    </td>
                                    <td>{{ $datosUnicosPorSolicitude->estado->nombre }}</td>

                                    <td>

                                        <a href="{{ route('datos-unicos-por-solicitudes.show', $datosUnicosPorSolicitude->id) }}"
                                            class="btn btn-outline"
                                            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                            onmouseover="this.style.backgroundColor='#b2ebf2';"
                                            onmouseout="this.style.backgroundColor='#FFFF';">
                                            {{ __('Detalle') }}
                                            <i class="fa-sharp fa-solid fa-eye fa-xs"
                                                style="color: #642c78; margin-left: 5px;"></i>
                                        </a>

                                        <a href="{{ route('datos-unicos-por-solicitudes.edit', $datosUnicosPorSolicitude->id) }}"
                                            class="btn btn-outline"
                                            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                            onmouseover="this.style.backgroundColor='#b2ebf2';"
                                            onmouseout="this.style.backgroundColor='#FFFF';">
                                            {{ __('Editar') }}
                                            <i class="fa-solid fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!-- Another tbody is created for the search records -->
                        <tbody id="Content" class="dataSearched">

                        </tbody>
                    </table>
                </div>
            </div>

            {!! $datosUnicosPorSolicitudes->links() !!}
        </div>
    </section>


    </div>
    {!! $datosUnicosPorSolicitudes->links() !!}
    </div>
    </div>
    </section>

    <!-- JS Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide();
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('searchDatoUnico') }}",
                data: {
                    'search': $value
                },

                success: function(data) {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
