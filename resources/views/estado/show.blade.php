@extends('layouts.app')

@section('template_title')
    {{ $estado->name ?? "__('Show') Estado" }}
@endsection

@section('content')

    <section class="container shadow bg-light my-5 p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size:180%">{{ __('DETALLES') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size:180%">{{ __('DE EL ESTADO') }}</h1>
                                    </div>
                                </div>
                        </div>
                        
                    </div>



                    <div class="table-responsive" style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr style="border-width: 2px">
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody class="alldata">
                                <tr>
                                    <td>{{ $estado->nombre }}</td>
                                    
                                </tr>
                            </tbody>
                            <!-- Another tbody is created for the search records -->
                            <tbody id="Content" class="dataSearched">

                            </tbody>
                        </table>
                       

                    </div>
                </div>
                <div class="float-right">
                    <a class="btn btn-outline" href="{{ route('estados.index') }}"  style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; margin-left: 90%;"
                    onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';"> {{ __('Regresar') }} 
                    <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
