@extends('layouts.app')

@section('template_title')
    Estados De Las Solictude
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex">{{ __('ESTADOS DE ') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex">{{ __('LAS SOLICITUDES') }}</h1>
                                </div>
                            </div>

                             <div class="float-right">
                                
                                    <a href="{{ route('estados-de-las-solictudes.create') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; ">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                                
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <div class="card-header">
                                    <input class="form-control" id="search" placeholder="Ingrese el nombre del Estado de la Solicitud...">
                                </div>
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($estadosDeLasSolictudes as $estadosDeLasSolictude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estadosDeLasSolictude->nombre }}</td>
											<td>{{ $estadosDeLasSolictude->estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estados-de-las-solictudes.show',$estadosDeLasSolictude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estados-de-las-solictudes.edit',$estadosDeLasSolictude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
