@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos De Solicitude
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                
                    <div class="">
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
    </section>
@endsection
