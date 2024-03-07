@extends('layouts.app')

@section('template_title')
    Nodo
@endsection

@section('content')
    

    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0;font-size: 180%" >{{ __('NO') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="margin-left:0 ;font-size: 180%">{{ __('DOS') }}</h1>
                                </div>
                            </div>
                            
                            <!-- <a href="{{ route('nodos.create') }}" class="btn btn-primary btn-sm">{{ __('Create New') }}</a> -->
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
                                <input class="form-control" id="search" placeholder="Ingrese el nombre del Nodo..." style="width: 70% ;">
                                <a href="{{ route('nodos.create') }}" class="btn btn-primary btn-sm">{{ __('Agregar nodo') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($nodos as $nodo)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $nodo->nombre }}</td>
                                        <td>{{ $nodo->estado->nombre }}</td>
                                        <td>{{ $nodo->ciudade->nombre }}</td>
                                        <td> 
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('nodos.show',$nodo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalle') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('nodos.edit',$nodo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
            </div>
        </div>
    </section>

    <!-- CSS Style -->

    <style>
        .table-bordered > :not(caption) > * > * {
            border-width: 0;
            border-bottom-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > td {
            border-width: 0;
            border-right-width: 1px;
            border-left-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered > thead > tr > th:first-child,
        .table-bordered > tbody > tr > td:first-child {
            border-left-width: 0;
        }

        .table-bordered > thead > tr > th:last-child,
        .table-bordered > tbody > tr > td:last-child {
            border-right-width: 0;
        }
    </style>

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
                url: "{{ URL::to('searchNodo') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
    
@endsection
