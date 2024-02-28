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
                                                <form action="{{ route('datos-por-solicituds.destroy',$datosPorSolicitud->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datos-por-solicituds.show',$datosPorSolicitud->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos-por-solicituds.edit',$datosPorSolicitud->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
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
