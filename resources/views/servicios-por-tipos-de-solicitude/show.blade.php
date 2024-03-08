@extends('layouts.app')

@section('template_title')
    {{ $serviciosPorTiposDeSolicitude->name ?? " __('Show') Servicios Por Tipos De Solicitude" }}
@endsection

@section('content')

    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('DETALLES DE EL') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('SERVICIO POR TIPO DE SOLICITUD') }}</h1>
                                    </div>
                                </div>
    
    
                            </div>
                            
                        </div>
    
                        <div class="card-body">
                            <div class="table-responsive"
                                style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr style="border-width: 2px">
                                            <th>Nombre</th>
                                            <th>Id Tipo De Solicitud:</th>
                                            <th>Id Estado:</th>
                                        </tr>
                                    </thead>
                                    <tbody class="alldata">
                                        <tr>
                                            <td>{{ $serviciosPorTiposDeSolicitude->nombre }}</td>
                                            <td>{{ $serviciosPorTiposDeSolicitude->tiposDeSolicitude->nombre }}</td>
                                            <td>{{ $serviciosPorTiposDeSolicitude->estado->nombre }}</td>
                                        </tr>
                                    </tbody>
                                    <!-- Another tbody is created for the search records -->
                                    <tbody id="Content" class="dataSearched">

                                    </tbody>
                                </table>
                            </div>
                            
    
                        </div>
                    </div>
                </div>
                <div class="float-right" style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; margin-left: 0;">
                    <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>">
                    <a class="btn btn-primary" href="{{ route('servicios-por-tipos-de-solicitudes.index') }}"> {{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
