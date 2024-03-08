@extends('layouts.app')

@section('template_title')
    Servicios Por Tipos De Solicitude
@endsection

@section('content')

    <section>
        <div class="container shadow p-4 my-5 bg-light rounded">
            <div class="row">
                <div class="col-sm-12">
                    
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
    
                        
                            <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr style="border-width: 2px">
                                            <th scope="col">No</th>
                                            
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Tipo De Solicitud</th>
                                            <th scope="col">Estado</th>
    
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="alldata">
                                        @foreach ($serviciosPorTiposDeSolicitudes as $serviciosPorTiposDeSolicitude)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                                <td>{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
                                                <td>{{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}</td>
                                                <td>{{ $serviciosPorTiposDeSolicitude->estado->nombre }}</td>
    
                                                <td>
                                                        <a class="btn btn-outline"  style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';" href="{{ route('servicios-por-tipos-de-solicitudes.show',$serviciosPorTiposDeSolicitude->id) }}"> {{ __('Detalle') }}<i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i></a>
                                                        <a class="btn btn-outline" style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                        onmouseout="this.style.backgroundColor='#FFFF';" href="{{ route('servicios-por-tipos-de-solicitudes.edit',$serviciosPorTiposDeSolicitude->id) }}"> {{ __('Editar') }} <i class="fa-solid fa-pen-to-square fa-xs" style="color: #39a900;"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                    
                    {!! $serviciosPorTiposDeSolicitudes->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
