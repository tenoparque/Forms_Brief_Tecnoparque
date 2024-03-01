@extends('layouts.app')

@section('template_title')
    Estados De Las Solictude
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estados De Las Solictude') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estados-de-las-solictudes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($estadosDeLasSolictudes as $estadosDeLasSolictude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estadosDeLasSolictude->nombre }}</td>
											<td>{{ $estadosDeLasSolictude->estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estados-de-las-solictudes.show',$estadosDeLasSolictude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estados-de-las-solictudes.edit',$estadosDeLasSolictude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $estadosDeLasSolictudes->links() !!}
            </div>
        </div>
    </div>
@endsection
