@extends('layouts.app')

@section('template_title')
    Datos Por Solicitud
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datos Por Solicitud') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('datos-por-solicituds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Solicitudes</th>
										<th>Id Datos Unicos Por Solicitudes</th>
										<th>Dato</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosPorSolicituds as $datosPorSolicitud)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosPorSolicitud->id_solicitudes }}</td>
											<td>{{ $datosPorSolicitud->id_datos_unicos_por_solicitudes }}</td>
											<td>{{ $datosPorSolicitud->dato }}</td>

                                            <td> 
                                           
                                                <a href="{{ route('datos-por-solicituds.show',$datosPorSolicitud->id) }}" class="btn btn-outline"
                                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                    onmouseout="this.style.backgroundColor='#FFFF';">
                                                    {{ __('Detalle') }}
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                                </a>
                                                
                                                <a href="{{ route('datos-por-solicituds.edit',$datosPorSolicitud->id) }}" class="btn btn-outline"
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
                {!! $datosPorSolicituds->links() !!}
            </div>
        </div>
    </div>
@endsection
