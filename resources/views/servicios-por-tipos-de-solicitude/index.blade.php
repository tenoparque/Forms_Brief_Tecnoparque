@extends('layouts.app')

@section('template_title')
    Servicios Por Tipos De Solicitude
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('SERVICIOS') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('POR TIPO DE SOLICITUD') }}</h1>
                                    </div>
                                </div>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('servicios-por-tipos-de-solicitudes.create') }}" class="btn btn-outline"
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
										<th>Tipo De Solicitud</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviciosPorTiposDeSolicitudes as $serviciosPorTiposDeSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
											<td>{{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}</td>
											<td>{{ $serviciosPorTiposDeSolicitude->estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('servicios-por-tipos-de-solicitudes.show',$serviciosPorTiposDeSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicios-por-tipos-de-solicitudes.edit',$serviciosPorTiposDeSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviciosPorTiposDeSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
