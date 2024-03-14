@extends('layouts.app')

@section('template_title')
    {{ $politica->name ?? " __('Show') Politica" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('DETALLES') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('DE LAS POLÍTICAS') }}</h1>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>Link:</th>
                                        <th>Descripcion:</th>
                                        <th style="width: 30%">Qr:</th>
                                        <th>Usuario:</th>
                                        <th>Estado:</th>
                                        <th>Titulo:</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>
                                        <td><a href="{{ $politica->link }}">Politicas</a></td>
                                        <td>{{ $politica->descripcion }}</td>
                                        <td>
                                            <div class="imgQr">
                                                <img src="data:image/png;base64,{{ base64_encode($politica->qr) }}"
                                                    alt="QR" class="ImgQrPoliticas">
                                            </div>
                                        </td>
                                        <td>{{ $politica->user->name }}</td>
                                        <td> {{ $politica->estado->nombre }}</td>
                                        <td>{{ $politica->titulo }}</td>
                                    </tr>
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>

                        <div class="float-right">
                            <a href="{{ route('politicas.index') }}" class="btn btn-outline"
                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 90%;"
                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                onmouseout="this.style.backgroundColor='#FFFF';">
                                {{ __('REGRESAR') }}
                                <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <a href="{{ route('politicas.index') }}" class="btnDCR"
                        >
                        {{ __('REGRESAR') }}
                        <i class="fa-solid fa-circle-play fa-flip-both iconDCR"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
