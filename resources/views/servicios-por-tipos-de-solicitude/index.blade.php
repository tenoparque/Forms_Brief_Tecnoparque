@extends('layouts.app')

@section('template_title')
    Servicios Por Tipos De Solicitude
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicios Por Tipos De Solicitude') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('servicios-por-tipos-de-solicitudes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Tipo De Solicitud</th>
										<th>Id Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviciosPorTiposDeSolicitudes as $serviciosPorTiposDeSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
											<td>{{ $serviciosPorTiposDeSolicitude->id_tipo_de_solicitud }}</td>
											<td>{{ $serviciosPorTiposDeSolicitude->id_estado }}</td>

                                            <td>
                                                <form action="{{ route('servicios-por-tipos-de-solicitudes.destroy',$serviciosPorTiposDeSolicitude->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('servicios-por-tipos-de-solicitudes.show',$serviciosPorTiposDeSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicios-por-tipos-de-solicitudes.edit',$serviciosPorTiposDeSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $serviciosPorTiposDeSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
