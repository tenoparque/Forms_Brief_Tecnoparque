@extends('layouts.app')

@section('template_title')
    Categorias Eventos Especiales
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('CATEGORIAS') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                            {{ __('DE EVENTOS ESPECIALES') }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search"
                                    placeholder="Ingrese el nombre de la categoria de eventos especiales..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('categorias-eventos-especiales.create') }}" class="btnCrear"
                                    >{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" ></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($categoriasEventosEspeciales as $categoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $categoria->nombre }}</td>
                                            <td>{{ $categoria->estado->nombre }}</td>
                                            <td id="buttoncell">
                                                <a  class="btnDetalle btn-outline" href="{{ route('categorias-eventos-especiales.show', $categoria->id) }}"
                                                   > 
                                                   <i class="fa-sharp fa-solid fa-eye fa-xs iconDCR"></i>
                                                   {{ __('Detalle') }} 
                                                </a>

                                                <a  class="btnEdit btn-outline" href="{{ route('categorias-eventos-especiales.edit', $categoria->id) }}"
                                                   >
                                                   <i class="fa-solid fa-pen-to-square fa-xs iconEdit"></i> 
                                                   {{ __('Editar') }} 
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched"></tbody>
                            </table>
                        </div>
                    </div>
                    {!! $categoriasEventosEspeciales->links() !!}
                </div>
            </div>
        </div>
    </section>


    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide();
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('searchCategoriaEvento') }}",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#Content').html(data);
                }
            });
        })
    </script>

    <style>
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .table-bordered> :not(caption)>*>* {
            border-width: 0;
            border-bottom-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>td {
            border-width: 0;
            border-right-width: 1px;
            border-left-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered>thead>tr>th:first-child,
        .table-bordered>tbody>tr>td:first-child {
            border-left-width: 0;
        }

        .table-bordered>thead>tr>th:last-child,
        .table-bordered>tbody>tr>td:last-child {
            border-right-width: 0;
        }
    </style>
@endsection
