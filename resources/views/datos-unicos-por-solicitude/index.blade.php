@extends('layouts.app')

@section('template_title')
    Datos Unicos Por Solicitude
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Datos Unicos Por Solicitude') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('datos-unicos-por-solicitudes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Id Tipos De Datos</th>
										<th>Id Tipos De Solicitudes</th>
										<th>Id Estados</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosUnicosPorSolicitudes as $datosUnicosPorSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosUnicosPorSolicitude->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->id_tipos_de_datos }}</td>
											<td>{{ $datosUnicosPorSolicitude->id_tipos_de_solicitudes }}</td>
											<td>{{ $datosUnicosPorSolicitude->id_estados }}</td>

                                            <td>
                                                <form action="{{ route('datos-unicos-por-solicitudes.destroy',$datosUnicosPorSolicitude->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datos-unicos-por-solicitudes.show',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos-unicos-por-solicitudes.edit',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $datosUnicosPorSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
