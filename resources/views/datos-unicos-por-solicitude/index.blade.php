@extends('layouts.app')

@section('template_title')
    Datos Unicos Por Solicitude
@endsection

@section('content')
<header class="container-fluid mt-5">
    <div class="row d-flex justify-content-between" style="align-items: center; margin-top: 60px">
        <!-- Carta Izquierda -->
        <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
            <div class="">
                <div class="text-wel">
                    <h5 class="welcoRe">BIENVENIDO</h5>
                    <div class="d-flex">
                        <h2 class="supereh">SUPER - ‎ </h2>
                        <h2 class="adminreh"> ADMIN</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carta Derecha -->
        <div class="col-sm-8 ">
            <img class="redtecnocol" src="/images/recursos/redtecnocol.png"></img>
        </div>
    </div>

</header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('DATOS UNICOS') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('POR TIPO DE SOLICITUD') }}</h1>
                                </div>
                            </div>

                             <div class="float-right">
                                <a href="{{ route('datos-unicos-por-solicitudes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Tipos De Datos</th>
										<th>Tipos De Solicitudes</th>
										<th>Estados</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datosUnicosPorSolicitudes as $datosUnicosPorSolicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $datosUnicosPorSolicitude->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->tiposDeDato->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->tiposDeSolicitude->nombre }}</td>
											<td>{{ $datosUnicosPorSolicitude->estado->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('datos-unicos-por-solicitudes.show',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos-unicos-por-solicitudes.edit',$datosUnicosPorSolicitude->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $datosUnicosPorSolicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
