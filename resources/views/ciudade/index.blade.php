@extends('layouts.app')

@section('template_title')
    Ciudade
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ciudade') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ciudades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Departamento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ciudades as $ciudade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ciudade->nombre }}</td>
											<td>{{ $ciudade->id_departamento }}</td>

                                            <td>
                                                <form action="{{ route('ciudades.destroy',$ciudade->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ciudades.show',$ciudade->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciudades.edit',$ciudade->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ciudades->links() !!}
            </div>
        </div>
    </div>
@endsection
