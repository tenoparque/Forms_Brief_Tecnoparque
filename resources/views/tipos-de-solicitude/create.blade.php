@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos De Solicitude
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
                        <div class="d-flex">
                            <div class="">
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('CREAR TIPO ') }}</h1>
                            </div>
                            <div class="">
                                <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE SOLICITUD') }}</h1>
                            </div>
                
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipos-de-solicitudes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipos-de-solicitude.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
