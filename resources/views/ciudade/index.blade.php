@extends('layouts.app')

@section('template_title')
    Ciudade
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size: 180%; font-weight: 900; color: rgb(0, 49, 77)">{{ __('CIUDADES') }}</h1>
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
                                <input class="form-control" id="search" placeholder="Ingrese el nombre de la ciudad..." style="width: 70%; border-radius: 50px">
                                <a href="{{ route('ciudades.create') }}" class="btn btn-custom">{{ __('Agregar ciudad') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($ciudades as $ciudade)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $ciudade->nombre }}</td>
                                        <td>{{ $ciudade->departamento->nombre }}</td>
                                        <td> 
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('ciudades.show',$ciudade->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalle') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('ciudades.edit',$ciudade->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $ciudades->links() !!}
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
                url: "{{ URL::to('searchCiudad') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
