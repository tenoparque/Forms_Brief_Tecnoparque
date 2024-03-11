@extends('layouts.app')

@section('template_title')
    Servicios Por Tipos De Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div style="d-flex justify-content-between align-items-center">
                                    <div class="d-flex mt-3 mb-4">
                                        <div>
                                            <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('SERVICIOS POR') }}</h1>
                                        </div>
                                        <div>
                                            <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('TIPO DE SOLICITUD') }}</h1>
                                        </div>
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
                                <a href="{{ route('roles.create') }}" class="btn btn-outline"
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
                                        <th>Tipo de solicitud</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($serviciosPorTiposDeSolicitudes as $serviciosPorTiposDeSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
    
                                            <td>{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
                                            <td>{{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}</td>
                                            <td>{{ $serviciosPorTiposDeSolicitude->estado->nombre }}</td>
    
                                            <td>
                                                <a class="btn btn-outline"
                                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                    onmouseout="this.style.backgroundColor='#FFFF';"
                                                    href="{{ route('servicios-por-tipos-de-solicitudes.show', $serviciosPorTiposDeSolicitude->id) }}">
                                                    {{ __('Detalle') }}<i class="fa-sharp fa-solid fa-eye fa-xs"
                                                        style="color: #642c78; margin-left: 5px;"></i></a>
                                                <a class="btn btn-outline"
                                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                    onmouseout="this.style.backgroundColor='#FFFF';"
                                                    href="{{ route('servicios-por-tipos-de-solicitudes.edit', $serviciosPorTiposDeSolicitude->id) }}">
                                                    {{ __('Editar') }} <i class="fa-solid fa-pen-to-square fa-xs"
                                                        style="color: #39a900;"></i></a>
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


                    {!! $serviciosPorTiposDeSolicitudes->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
