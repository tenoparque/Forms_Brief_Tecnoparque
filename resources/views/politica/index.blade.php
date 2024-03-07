@extends('layouts.app')

@section('template_title')
    Politica
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0;font-size: 180%" >{{ __('POLI') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="margin-left:0 ;font-size: 180%">{{ __('TICAS') }}</h1>
                                </div>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('politicas.create') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; ">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
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
										<th>Usuario</th>
										<th>Estado</th>
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
											<td>{{ $politica->user->name }}</td>
											<td>{{ $politica->estado->nombre}}</td>
											<td>{{ $politica->titulo }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('politicas.show',$politica->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('politicas.edit',$politica->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
