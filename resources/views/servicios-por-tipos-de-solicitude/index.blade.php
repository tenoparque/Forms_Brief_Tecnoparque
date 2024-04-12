@extends('layouts.app')

@section('template_title')
    Servicios Por Tipos De Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center;">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%;">{{ __('SERVICIOS POR') }}</h1>
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
            <div class="">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-between align-items-center search-Header">
                        
                        <input class="form-control inputSearch" id="search" placeholder="Ingrese el nombre del servicio..." style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">

                        <a href="{{ route('servicios-por-tipos-de-solicitudes.create') }}" class="btnCrear"
                        >{{ __('CREAR') }}
                        <i class="fa-solid fa-circle-play iconDCR"></i></a>
                    </div>
                </div>
                <div class="table-responsive"
                    style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr style="border-width: 2px">
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Tipo de solicitud</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @foreach ($serviciosPorTiposDeSolicitudes as $serviciosPorTiposDeSolicitude)
                                <tr>
                                    <td data-titulo="No">{{ ++$i }}</td>

                                    <td data-titulo="Nombre">{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
                                    <td data-titulo="Tipo de Solicitud">{{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}</td>
                                    <td data-titulo="Estado">{{ $serviciosPorTiposDeSolicitude->estado->nombre }}</td>

                                    <td id="buttoncell">
                                        <a class="btnDetalle"
                                            
                                            href="{{ route('servicios-por-tipos-de-solicitudes.show', $serviciosPorTiposDeSolicitude->id) }}">
                                            <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"
                                                ></i>
                                            {{ __('Detalle') }}
                                            </a>
                                        <a class="btnEdit"
                                            
                                            href="{{ route('servicios-por-tipos-de-solicitudes.edit', $serviciosPorTiposDeSolicitude->id) }}">
                                            <i class="fa-solid fa-pen-to-square fa-xs iconEdit"></i>
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
                    {!! $serviciosPorTiposDeSolicitudes->links() !!}
                </div>
            </div>


            
        </div>
    </section>

    <!-- JS Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup',function()
        {
            $value=$(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide(); 
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('searchServiciosPorTiposDeSolicitude') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
