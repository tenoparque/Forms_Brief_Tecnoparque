@extends('layouts.app')

@section('template_title')
    Personalizacione
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
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size: 180%; font-weight: 900; color: rgb(0, 49, 77)">{{ __('PERSONALIZACIONES') }}</h1>
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
                                <input class="form-control" id="search" placeholder="Ingrese el nombre deL nodo..." style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('personalizaciones.create') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; " onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Logo</th>
										<th>Color Principal</th>
										<th>Color Secundario</th>
										<th>Color Terciario</th>
										<th>Usuario</th>
										<th>Estado</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($personalizaciones as $personalizacione)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $personalizacione->logo }}</td>
                                        <td>{{ $personalizacione->color_principal }}</td>
                                        <td>{{ $personalizacione->color_secundario }}</td>
                                        <td>{{ $personalizacione->color_terciario }}</td>
                                        <td>{{ $personalizacione->user->email }}</td>
                                        <td>{{ $personalizacione->estado->nombre }}</td>
                                        <td> 
                                           
                                            <a href="{{ route('personalizaciones.show',$personalizacione->id) }}" class="btn btn-outline"
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';">
                                                {{ __('Detalle') }}
                                                <i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                            </a>
                                            
                                            <a href="{{ route('personalizaciones.edit',$personalizacione->id) }}" class="btn btn-outline"
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

                </div>
                {!! $personalizaciones->links() !!}
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
                url: "{{ URL::to('searchPersonalizaciones') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection