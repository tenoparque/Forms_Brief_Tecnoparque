@extends('layouts.app')

@section('template_title')
    Historial De Modificaciones Por Solicitude
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historial De Modificaciones Por Solicitude') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('historial-de-modificaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Soli</th>
										<th>Modificacion</th>
										<th>Fecha De Modificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialDeModificacionesPorSolicitudes as $historialDeModificacionesPorSolicitude)
                                        <tr>
                                            <td data-titulo="No">{{ ++$i }}</td>
                                            
											<td data-titulo="Id Solic">{{ $historialDeModificacionesPorSolicitude->id_soli }}</td>
											<td data-titulo="Modificacion">{{ $historialDeModificacionesPorSolicitude->modificacion }}</td>
											<td data-titulo="Fecha de Modificacion">{{ $historialDeModificacionesPorSolicitude->fecha_de_modificacion }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('historial-de-modificaciones-por-solicitudes.show',$historialDeModificacionesPorSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('historial-de-modificaciones-por-solicitudes.edit',$historialDeModificacionesPorSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $historialDeModificacionesPorSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
