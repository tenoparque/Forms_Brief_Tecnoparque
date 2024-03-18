@extends('layouts.app')

@section('template_title')
    {{ $eventosEspecialesPorCategoria->name ?? " __('Show') Eventos Especiales Por Categoria" }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size:200%">{{ __('DETALLE DEL') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('EVENTO ESPECIAL POR CATEGORIA') }}
                                    </h1>
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
                                        <th>Evento Especial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $eventosEspecialesPorCategoria->nombre }}</td>
                                        <td>{{ $eventosEspecialesPorCategoria->estado->nombre }}</td>
                                        <td>{{ $eventosEspecialesPorCategoria->categoriasEventosEspeciale->nombre }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('eventos-especiales-por-categorias.index') }}" class="btnRegresar"
                    >
                    {{ __('REGRESAR') }}
                    <i class="fa-solid fa-circle-play fa-flip-both iconDCR" ></i>
                </a>
            </div>
        </div>

    </section>
@endsection
