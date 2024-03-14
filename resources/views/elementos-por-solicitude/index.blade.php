@extends('layouts.app')

@section('template_title')
    Elementos Por Solicitude
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Elementos Por Solicitude') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('elementos-por-solicitudes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Subservicios</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($elementosPorSolicitudes as $elementosPorSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $elementosPorSolicitude->id_solicitudes }}</td>
											<td>{{ $elementosPorSolicitude->id_subservicios }}</td>

                                            <td>
                                                <form action="{{ route('elementos-por-solicitudes.destroy',$elementosPorSolicitude->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('elementos-por-solicitudes.show',$elementosPorSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('elementos-por-solicitudes.edit',$elementosPorSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $elementosPorSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
