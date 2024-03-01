@extends('layouts.app')

@section('template_title')
    Personalizacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personalizacione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('personalizaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Logo</th>
										<th>Color Principal</th>
										<th>Color Secundario</th>
										<th>Color Terciario</th>
										<th>Usuario</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personalizaciones as $personalizacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $personalizacione->logo }}</td>
											<td>{{ $personalizacione->color_principal }}</td>
											<td>{{ $personalizacione->color_secundario }}</td>
											<td>{{ $personalizacione->color_terciario }}</td>
											<td>{{ $personalizacione->id_users }}</td>
											<td>{{ $personalizacione->estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personalizaciones.show',$personalizacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('personalizaciones.edit',$personalizacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personalizaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
