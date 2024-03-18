@extends('layouts.app')

@section('template_title')
    Estados De Las Solictude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('ESTADOS DE') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('LAS SOLICITUDES') }}</h1>
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

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search" placeholder="Ingrese el nombre del estado..." style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('estados-de-las-solictudes.create') }}" class="btnCrear">{{ __('CREAR') }}
                                <i class="fa-solid fa-circle-play iconDCR" ></i></a>
                            </div>
                        </div>
                        <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <tr>
                                            <th>No</th>
                                        
                                            <th>Nombre</th>
                                            <th>Estado</th>
    
                                            <th>Opciones</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($estadosDeLasSolictudes as $estadosDeLasSolictude)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $estadosDeLasSolictude->nombre }}</td>
                                        <td>{{ $estadosDeLasSolictude->estado->nombre }}</td>

                                        <td id="buttoncell">
                                            <a href="{{ route('estados-de-las-solictudes.show' ,$estadosDeLasSolictude->id) }}" class="btnDetalle"
                                                >
                                                <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR" ></i>
                                                {{ __('Detalle') }}
                                                
                                            </a>
                                            
                                            <a href="{{ route('estados-de-las-solictudes.edit' , $estadosDeLasSolictude->id) }}" class="btnEdit"
                                                >
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
                    </div>
                </div>
                {!! $estadosDeLasSolictudes->links() !!}
            </div>
        </div>
    </div>

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
                url: "{{ URL::to('searchEstadoSolicitud') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
