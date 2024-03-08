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
                                    <a href="{{ route('estados.create') }}" class="btn btn-outline"
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
                                                <a href="{{ route('estados.show' ,$estado->id) }}" class="btn btn-outline"
                                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                    onmouseout="this.style.backgroundColor='#FFFF';">
                                                    {{ __('Detalle') }}
                                                    <i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                                </a>
                                                
                                                <a href="{{ route('estados.edit' , $estado->id) }}" class="btn btn-outline"
                                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                    onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                    onmouseout="this.style.backgroundColor='#FFFF';">
                                                    {{ __('Editar') }}
                                                    <i class="fa-solid fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                                                </a>
                                                    
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
