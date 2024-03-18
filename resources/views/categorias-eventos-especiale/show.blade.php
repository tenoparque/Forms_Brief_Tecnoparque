@extends('layouts.app')

@section('template_title')
    {{ $categoriasEventosEspeciale->name ?? "__('Show') Categorias Eventos Especiale" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-md-12d">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLE') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                        {{ __('CATEGORIA EVENTOS ESPECIALES') }}</h1>
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
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>
                                        <td>{{ $categoriasEventosEspeciale->nombre }}</td>
                                        <td>{{ $categoriasEventosEspeciale->estado->nombre }}</td>
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
            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('categorias-eventos-especiales.index') }}" class="btnRegresar">
                    {{ __('REGRESAR') }}
                    <i class="fa-solid fa-circle-play fa-flip-both iconDCR"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
