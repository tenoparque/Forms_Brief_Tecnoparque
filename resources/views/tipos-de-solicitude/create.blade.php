@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos De Solicitude
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="primeraPalabraFlex">{{ __('CREAR TIPO ') }}</h1>
                            </div>
                            <div class="">
                                <h1 class="segundaPalabraFlex">{{ __('DE SOLICITUD') }}</h1>
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
