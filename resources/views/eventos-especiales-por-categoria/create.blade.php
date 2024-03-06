@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Eventos Especiales Por Categoria
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

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
    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex">{{ __('CREAR EVENTO') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex">{{ __('ESPECIAL POR CATEGORIA') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('eventos-especiales-por-categorias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('eventos-especiales-por-categoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
