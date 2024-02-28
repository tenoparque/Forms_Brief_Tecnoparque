@extends('layouts.app')

@section('template_title')
    Politica
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Politica') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('politicas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Link</th>
										<th>Descripcion</th>
										<th>Qr</th>
										<th>Id Usuario</th>
										<th>Id Estado</th>
										<th>Titulo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($politicas as $politica)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $politica->link }}</td>
											<td>{{ $politica->descripcion }}</td>
											<td>{{ $politica->qr }}</td>
											<td>{{ $politica->id_usuario }}</td>
											<td>{{ $politica->id_estado }}</td>
											<td>{{ $politica->titulo }}</td>

                                            <td>
                                                <form action="{{ route('politicas.destroy',$politica->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('politicas.show',$politica->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('politicas.edit',$politica->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $politicas->links() !!}
            </div>
        </div>
    </div>
@endsection
