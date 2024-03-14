@extends('layouts.app')

@section('template_title')
    {{ $personalizacione->name ?? 'Show Personalizacione' }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-2">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLE DE ') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('PERSONALIZACIÓN') }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th style=" width: 50%">Logo</th>
                                        <th>Color Principal</th>
                                        <th>Color Secundario</th>
                                        <th>Color Terciario</th>
                                        <th>Uusario</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>

                                        <td>
                                            <div class="logoPersonalizacion" >
                                                <img src="data:image/png;base64,{{ base64_encode($personalizacione->logo) }}"
                                                    alt="LOGO" class="ImgCeldaPesonalizacion">
                                        </td>
                        </div>
                        <td>
                            <div class="PersonalizacionColor">
                                <div class="ChildrenPersonalizacion"
                                    style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_principal }}; ">
                                </div>
                                {{ $personalizacione->color_principal }}
                            </div>
                        </td>
                        <td>
                            <div class="PersonalizacionColor">
                                <div class="ChildrenPersonalizacion"
                                    style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_secundario }}; ">
                                </div>
                                {{ $personalizacione->color_secundario }}
                            </div>
                        </td>
                        <td>
                            <div class="PersonalizacionColor">
                                <div class="ChildrenPersonalizacion"
                                    style="width: 20px; height: 20px; background-color: {{ $personalizacione->color_terciario }}; ">
                                </div>
                                {{ $personalizacione->color_terciario }}
                            </div>
                        </td>
                        <td>{{ $personalizacione->user->email }}</td>
                        <td>{{ $personalizacione->estado->nombre }}</td>
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
        <div>
            <a href="{{ route('personalizaciones.index') }}" class="btnDCR"
                >
                {{ __('REGRESAR') }}
                <i class="fa-solid fa-circle-play fa-flip-both iconDCR" ></i>
            </a>
        </div>
        </div>
    </section>
@endsection
