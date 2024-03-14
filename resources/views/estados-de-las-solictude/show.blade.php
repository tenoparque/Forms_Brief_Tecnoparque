@extends('layouts.app')

@section('template_title')
    {{ $estadosDeLasSolictude->name ?? " __('Show') Estados De Las Solictude" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLE DEL') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style = "font-size: 200%">{{ __('ESTADO DE LA SOLICITUD') }}</h1>
                                </div>
                            </div>

                        </div>
                        
                    </div>

                    <div class="">
                        <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>
                                        <td>{{ $estadosDeLasSolictude->nombre }}</td>
                                        <td>{{ $estadosDeLasSolictude->estado->nombre }}</td>
                                       
                                    </tr>
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>
                        

                    </div>
                    <div class="float-right">
                        <a href="{{ route('estados-de-las-solictudes.index') }}" class="btn btn-outline"
                            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 90%;"
                            onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">
                            {{ __('REGRESAR') }}
                            <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
