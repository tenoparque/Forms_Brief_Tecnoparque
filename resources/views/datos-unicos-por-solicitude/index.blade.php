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
                            style="width: 70%; border-radius: 50px; border-style: solid; border-width:3px; border-color: #DEE2E6 ">
                            <a href="{{ route('datos-unicos-por-solicitudes.create') }}" class="btnCrear"
                            >{{ __('CREAR') }}
                            <i class="fa-solid fa-circle-play iconDCR" ></i></a>
                    </div>
                </div>
                <div class="table-responsive"
                style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                    <table class="table table-bordered table-hover " style="width=25%">
                        <thead class="thead-dark">
                            <tr style="border-width: 2px;width:25%">
                                <th scope="col">No</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo De Dato</th>
                                <th scope="col">Tipo De Solicitud</th>
                                <th scope="col">Estado</th>

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

                                    <td id="buttoncell">

                                        <a href="{{ route('datos-unicos-por-solicitudes.show', $datosUnicosPorSolicitude->id) }}"
                                            class="btnDetalle"
                                           >
                                           <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"></i>
                                            {{ __('Detalle') }}
                                            
                                        </a>

                                        <a href="{{ route('datos-unicos-por-solicitudes.edit', $datosUnicosPorSolicitude->id) }}"
                                            class="btnEdit">
                                            <i class="fa-solid fa-pen-to-square fa-xs iconEdit" ></i>
                                            {{ __('Editar') }}
                                            
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
                <div class="mt-2">
                    {!! $datosUnicosPorSolicitudes->links() !!}
                </div>
            </div>

            
        </div>
    </section>


    </div>
    
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
