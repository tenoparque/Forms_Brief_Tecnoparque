@extends('layouts.app')

@section('template_title')
    Ciudade
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <header class="container-fluid mt-5">
        <div class="row d-flex justify-content-between" style="align-items: center; margin-top: 60px">
            <!-- Carta Izquierda -->
            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                <div class="">
                    <div class="text-wel">
                        <h5 class="welcoRe">BIENVENIDO</h5>
                        <div class="d-flex">
                            <h2 class="supereh">SUPER - ‎ </h2>
                            <h2 class="adminreh"> ADMIN</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carta Derecha -->
            <div class="col-sm-8 ">
                <img class="redtecnocol" src="/images/recursos/redtecnocol.png"></img>
            </div>
        </div>

    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0" style="font-size:180%">{{ __('CIUD') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="margin-left: 0" style="font-size: 180%">{{ __('ADES') }}</h1>
                                </div>
                            </div>
                            

                             <div class="float-right">
                                <a href="{{ route('ciudades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                    <input class="form-control" id="search" placeholder="Ingrese el nombre de la Ciudad...">
                                </div>
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Departamento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($ciudades as $ciudade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ciudade->nombre }}</td>
											<td>{{ $ciudade->departamento->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ciudades.show',$ciudade->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciudades.edit',$ciudade->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
