@extends('layouts.app')

@section('template_title')
    Tipos De Dato
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipos De Dato') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipos-de-datos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposDeDatos as $tiposDeDato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tiposDeDato->nombre }}</td>
											<td>{{ $tiposDeDato->id_estado }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipos-de-datos.show',$tiposDeDato->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipos-de-datos.edit',$tiposDeDato->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tiposDeDatos->links() !!}
            </div>
        </div>
    </div>
@endsection
