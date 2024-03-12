@extends('layouts.app')

@section('template_title')
    Solicitude
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
                                        <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)"> {{ __('SOLICITUDES') }}</h1>
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
                                <input class="form-control" id="search" placeholder="xxx..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('solicitudes.create') }}" class="btn btn-outline"
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
                                        
										<th>Tipo De Solicitud</th>
										<th>Fecha Y Hora De La Solicitud</th>
										<th>Usuario Que Realiza La Solicitud</th>
										<th>Eventos Especiales Por Categorias</th>
										<th>Estado De La Solicitud</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($solicitudes as $solicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $solicitude->id_tipos_de_solicitudes }}</td>
											<td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
											<td>{{ $solicitude->id_usuario_que_realiza_la_solicitud }}</td>
											<td>{{ $solicitude->id_eventos_especiales_por_categorias }}</td>
											<td>{{ $solicitude->id_estado_de_la_solicitud }}</td>

                                            <td>
                                                <form action="{{ route('roles.show', $solicitude->id) }}" method="POST">
                                                    <a class="btn btn-outline"
                                                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';"
                                                        href="{{ route('solicitudes.show', $role->id) }}"><i
                                                            class="fa-sharp fa-solid fa-eye fa-xs"
                                                            style="color: #642c78; margin-left: 5px;"></i>
                                                        {{ __('Detalle') }}</a>

                                                    <a class="btn btn-outline"style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';"
                                                        href="{{ route('solicitudes.edit', $role->id) }}"><i
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
                {!! $solicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
