@extends('layouts.app')

@section('template_title')
    Departamento
@endsection

@section('content')
    <section class="container-fluid shadow p-4 my-5 bg-light rounded"style="width:100rem">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0;font-size: 180%">
                                        {{ __('DEPAR') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="margin-left: 0;font-size: 180%">
                                        {{ __('TAMENTOS') }}</h1>
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
                                    placeholder="Ingrese el nombre del Departamento..." style="width: 70% ;">
                                <a href="{{ route('departamentos.create') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; ">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($departamentos as $departamento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $departamento->nombre }}</td>
                                            <td>
                                                <a href="{{ route('departamentos.create') }}" class="btn btn-outline"
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';">
                                                {{ __('Detalle') }}
                                                <i class="fa-sharp fa-solid fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                            </a>
                                            
                                            <a href="{{ route('departamentos.create') }}" class="btn btn-outline"
                                                style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                                onmouseover="this.style.backgroundColor='#b2ebf2';"
                                                onmouseout="this.style.backgroundColor='#FFFF';">
                                                {{ __('Editar') }}
                                                <i class="fa-solid fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                                            </a>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CSS Style -->

    <style>
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
                url: "{{ URL::to('searchDepartamento') }}",
                data: {
                    'search': $value
                },

                success: function(data) {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
