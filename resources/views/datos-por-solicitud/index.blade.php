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
                        <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th  scope="col">No</th>
                                        
										<th scope="col">Id Solicitudes</th>
										<th scope="col">Id Datos Unicos Por Solicitudes</th>
										<th scope="col">Dato</th>

                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($datosPorSolicituds as $datosPorSolicitud)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosPorSolicitud->id_solicitudes }}</td>
											<td>{{ $datosPorSolicitud->id_datos_unicos_por_solicitudes }}</td>
											<td>{{ $datosPorSolicitud->dato }}</td>

                                            <td id="buttoncell"> 
                                           
                                                <a href="{{ route('datos-por-solicituds.show',$datosPorSolicitud->id) }}" class="btnDCR"
                                                    >
                                                    {{ __('Detalle') }}
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR" ></i>
                                                </a>
                                                
                                                <a href="{{ route('datos-por-solicituds.edit',$datosPorSolicitud->id) }}" class="btnEdit"
                                                    >
                                                    {{ __('Editar') }}
                                                    <i class="fa-solid fa-pen-to-square fa-xs iconEdit" ></i>
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
