@extends('layouts.app')

@section('template_title')
    Eventos Especiales Por Categoria
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

   
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin: 0%">{{ __('EVENTOS ESPEC') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex">{{ __('IALES POR CATEGORIA') }}</h1>
                                </div>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('eventos-especiales-por-categorias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Estado</th>
										<th>Eventos Especiales</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventosEspecialesPorCategorias as $eventosEspecialesPorCategoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $eventosEspecialesPorCategoria->nombre }}</td>
											<td>{{ $eventosEspecialesPorCategoria->estado->nombre }}</td>
											<td>{{ $eventosEspecialesPorCategoria->categoriasEventosEspeciale->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('eventos-especiales-por-categorias.show',$eventosEspecialesPorCategoria->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('eventos-especiales-por-categorias.edit',$eventosEspecialesPorCategoria->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $eventosEspecialesPorCategorias->links() !!}
            </div>
        </div>
    </div>
@endsection
