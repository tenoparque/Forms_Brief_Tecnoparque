@extends('layouts.app')

@section('template_title')
    Tipos de dato 
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
                                            <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('TIPOS') }}</h1>
                                        </div>
                                        <div>
                                            <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE DATOS') }}</h1>
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
                                <input class="form-control" id="search" placeholder="Ingrese el nombre del tipo de dato..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('tipos-de-datos.create') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; "
                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                    onmouseout="this.style.backgroundColor='#FFFF';">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Estado</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($tiposDeDatos as $tiposDeDato)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $tiposDeDato->nombre }}</td>
                                            <td>{{ $tiposDeDato->estado->nombre }}</td>

                                            <td>
                                                <form action="{{ route('tipos-de-datos.show', $tiposDeDato->id) }}" method="POST">
                                                    <a class="btn btn-outline"
                                                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';"
                                                        href="{{ route('tipos-de-datos.show', $tiposDeDato->id) }}"><i
                                                            class="fa-sharp fa-solid fa-eye fa-xs"
                                                            style="color: #642c78; margin-left: 5px;"></i>
                                                        {{ __('Detalle') }}</a>

                                                    <a class="btn btn-outline"style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';"
                                                        href="{{ route('tipos-de-datos.edit', $tiposDeDato->id) }}"><i
                                                            class="fa-solid fa-pen-to-square fa-xs"
                                                            style="color: #39a900;"></i> {{ __('Editar') }}</a>

                                                </form>
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
                {!! $tiposDeDatos->links() !!}
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
                url: "{{ URL::to('searchTiposDato') }}",
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

