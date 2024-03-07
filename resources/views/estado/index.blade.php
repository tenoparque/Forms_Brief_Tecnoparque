@extends('layouts.app')

@section('template_title')
    Estado
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size: 180%; font-weight: 900; color: rgb(0, 49, 77)">{{ __('ESTADOS') }}</h1>

                                    </div>
                                    
                                </div>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estados as $estado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estados.show',$estado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estados->links() !!}
            </div>
        </div>
    </div>
@endsection
