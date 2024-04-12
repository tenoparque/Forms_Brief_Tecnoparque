@extends('layouts.app')

@section('template_title')
    Estados
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)"> {{ __('ESTADOS') }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>          
                   <div class="">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center search-Header">
                                <input class="form-control inputSearch" id="search" placeholder="Ingrese el nombre del estado..." style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('estados.create') }}" class="btnCrear"
                                    >{{ __('CREAR') }}
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
    
                                            <th>Opciones</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($estados as $estado)
                                    <tr>
                                        <td data-titulo="No">{{ ++$i }}</td>
                                        
                                        <td data-titulo="Nombre">{{ $estado->nombre }}</td>

                                        <td id="buttoncell">
                                                <a href="{{ route('estados.show' ,$estado->id) }}" class="btnDetalle">
                                                    {{ __('Detalle') }}
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR" ></i>
                                                </a>
                                                
                                                <a href="{{ route('estados.edit' , $estado->id) }}" class="btnEdit">
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
                {!! $estados->links() !!}
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
                url: "{{ URL::to('searchEstados') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection