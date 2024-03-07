@extends('layouts.app')

@section('template_title')
    Tipos De Dato
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex">
                                <div class="">
                                    <h1 class="primeraPalabraFlex">{{ __('TIPOS DE') }}</h1>
                                </div>
                                <div class="">
                                    <h1 class="segundaPalabraFlex">{{ __('DATOS') }}</h1>
                                </div>
                    
                            </div>

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
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposDeDatos as $tiposDeDato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tiposDeDato->nombre }}</td>
											<td>{{ $tiposDeDato->estado->nombre }}</td>

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
