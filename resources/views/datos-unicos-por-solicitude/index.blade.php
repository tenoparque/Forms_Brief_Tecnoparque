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
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datos-unicos-por-solicitudes.show',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos-unicos-por-solicitudes.edit',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
