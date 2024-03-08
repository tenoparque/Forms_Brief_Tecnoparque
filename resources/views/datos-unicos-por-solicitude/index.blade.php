@extends('layouts.app')

@section('template_title')
    Datos Unicos Por Solicitude
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('DATOS UNICOS') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('POR TIPO DE SOLICITUD') }}</h1>
                                </div>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('datos-unicos-por-solicitudes.create') }}" class="btn btn-outline"
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Tipo De Dato</th>
										<th>Tipo De Solicitud</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosUnicosPorSolicitudes as $datosUnicosPorSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosUnicosPorSolicitude->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->tiposDeDato->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->tiposDeSolicitude->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->estado->nombre }}</td>

                                            <td> 
                                                <a href="{{ route('datos-unicos-por-solicitudes.show' ,$datosUnicosPorSolicitude->id) }}" class="btn btn-outline"
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';">
                                                {{ __('Detalle') }}
                                                <i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                            </a>
                                            
                                            <a href="{{ route('datos-unicos-por-solicitudes.edit' , $datosUnicosPorSolicitude->id) }}" class="btn btn-outline"
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
                            </table>
                        </div>
                    </div>
                </div>
                {!! $datosUnicosPorSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
