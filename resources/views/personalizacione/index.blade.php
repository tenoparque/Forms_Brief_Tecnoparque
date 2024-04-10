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
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover" >
                                <thead class="thead-dark">
                                    <tr style="text-align: center">
                                        {{-- <th>No</th> --}}

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
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            <td data-titulo="Logo">
                                               <div class="logoPersonalizacion" style="">
                                                <img src="data:image/png;base64,{{ base64_encode($personalizacione->logo) }}"
                                                alt="LOGO" class="ImgCeldaPesonalizacion" >
                                            </td>
                                               </div>
                                            <td data-titulo="Color Principal">
                                                <div class="PersonalizacionColor" >
                                                    <div class="ChildrenPersonalizacion"
                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_principal }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_principal }}
                                                </div>
                                            </td>
                                            <td data-titulo="Color Secundario" >
                                                <div class="PersonalizacionColor">
                                                    <div class="ChildrenPersonalizacion"
                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_secundario }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_secundario }}
                                                </div>
                                            </td>
                                            <td data-titulo="Color Terciario">
                                                <div class="PersonalizacionColor" >
                                                    <div class="ChildrenPersonalizacion"

                                                        style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_terciario }}; ">
                                                    </div>
                                                    {{ $personalizacione->color_terciario }}
                                                </div>
                                            </td>
                                            <td data-titulo="Email de Usuario">{{ $personalizacione->user->email }}</td>
                                            <td data-titulo="Estado">{{ $personalizacione->estado->nombre }}</td>
                                            <td id="buttoncell" >

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
                            </table>
                        </div>
                    </div>

                </div>
                {!! $personalizaciones->links() !!}
            </div>
        </div>
    </section>
@endsection
