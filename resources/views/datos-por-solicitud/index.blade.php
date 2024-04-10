@extends('layouts.app')

@section('template_title')
    Datos Por Solicitud
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
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
                                            <td data-titulo="No">{{ ++$i }}</td>
                                            
											<td data-titulo="Id Solicitudes">{{ $datosPorSolicitud->id_solicitudes }}</td>
											<td data-titulo="Id Datos Unicos Por Solicitudes">{{ $datosPorSolicitud->id_datos_unicos_por_solicitudes }}</td>
											<td data-titulo="Dato">{{ $datosPorSolicitud->dato }}</td>

                                            <td id="buttoncell"> 
                                           
                                                <a href="{{ route('datos-por-solicituds.show',$datosPorSolicitud->id) }}" class="btn"
                                                    >
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR" ></i>
                                                    {{ __('Detalle') }}
                                                    
                                                </a>
                                                
                                                <a href="{{ route('datos-por-solicituds.edit',$datosPorSolicitud->id) }}" class="btnEdit"
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
                        <div class="mt-2">
                            {!! $datosPorSolicituds->links() !!}
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
