@extends('layouts.app')

@section('template_title')
    Categorias Eventos Especiales
@endsection

@section('content')

<header class="container-fluid mt-5">
    <div class="row d-flex justify-content-between" style="align-items: center; margin-top: 60px">
        <!-- Carta Izquierda -->
        <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
            <div class="">
                <div class="text-wel">
                    <h5 class="welcoRe">BIENVENIDO</h5>
                    <div class="d-flex">
                        <h2 class="supereh">SUPER - ‎ </h2>
                        <h2 class="adminreh"> ADMIN</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carta Derecha -->
        <div class="col-sm-8 ">
            <img class="redtecnocol" src="/images/recursos/redtecnocol.png"></img>
        </div>
    </div>
</header>

<section class="container shadow p-4 my-5 bg-light rounded">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('CATEGORIAS') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE EVENTOS ESPECIALES') }}</h1>
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
                            <input class="form-control" id="search" placeholder="Ingrese el nombre de la Categoria..." style="width: 70% ;">
                            <a href="{{ route('categorias-eventos-especiales.create') }}" class="btn btn-primary btn-sm">{{ __('Crear') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="alldata">
                                @foreach ($categoriasEventosEspeciales as $categoria)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>{{ $categoria->estado->nombre }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary " href="{{ route('categorias-eventos-especiales.show',$categoria->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('categorias-eventos-especiales.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
    $('#search').on('keyup',function() {
        $value=$(this).val();

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
            data:{'search': $value},
            success:function(data) {
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

    .table-bordered > :not(caption) > * > * {
        border-width: 0;
        border-bottom-width: 1px;
        border-color: #dee2e6;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > td {
        border-width: 0;
        border-right-width: 1px;
        border-left-width: 1px;
        border-color: #dee2e6;
    }

    .table-bordered > thead > tr > th:first-child,
    .table-bordered > tbody > tr > td:first-child {
        border-left-width: 0;
    }

    .table-bordered > thead > tr > th:last-child,
    .table-bordered > tbody > tr > td:last-child {
        border-right-width: 0;
    }
</style>
@endsection
