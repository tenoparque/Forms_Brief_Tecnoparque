@extends('layouts.app')

@section('template_title')
    Personalizacione
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
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('PERSONALIZACIONES') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search" placeholder="Ingrese el correo del usuario..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                    <a href="{{ route('personalizaciones.create') }}" class="btnCrear"
                                    >{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play iconDCR" ></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover" >
                                <thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th>No</th>

                                        <th style=" width: 30%">Logo</th>
                                        <th>Color Principal</th>
                                        <th>Color Secundario</th>
                                        <th>Color Terciario</th>
                                        <th>Email de Usuario</th>
                                        <th>Estado</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata" >
                                    @foreach ($personalizaciones as $personalizacione)
                                        <tr >
                                            <td>{{ ++$i }}</td>
                                            <td>
                                               <div class="logoPersonalizacion" style="">
                                                <img src="data:image/png;base64,{{ base64_encode($personalizacione->logo) }}"
                                                alt="LOGO" class="ImgCeldaPesonalizacion" ></td>
                                               </div>
                                            <td>
                                                <div class="PersonalizacionColor" >
                                                    <div class="ChildrenPersonalizacion"
                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_principal }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_principal }}
                                                </div>
                                            </td>
                                            <td >
                                                <div class="PersonalizacionColor">
                                                    <div class="ChildrenPersonalizacion"
                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_secundario }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_secundario }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="PersonalizacionColor" >
                                                    <div class="ChildrenPersonalizacion"

                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_terciario }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_terciario }}
                                                </div>
                                            </td>
                                            <td>{{ $personalizacione->user->email }}</td>
                                            <td>{{ $personalizacione->estado->nombre }}</td>
                                            <td id="buttoncell"  style="width:250px">

                                                <a href="{{ route('personalizaciones.show', $personalizacione->id) }}"
                                                    class="btnDetalle"
                                                    >
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"
                                                        ></i>
                                                    {{ __('Detalle') }}
                                                    
                                                </a>

                                                <a href="{{ route('personalizaciones.edit', $personalizacione->id) }}"
                                                    class="btnEdit"
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
                {!! $personalizaciones->links() !!}
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
                url: "{{ URL::to('searchPersonalizaciones') }}",
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
