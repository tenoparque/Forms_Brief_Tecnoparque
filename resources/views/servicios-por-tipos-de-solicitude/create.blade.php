@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Servicios Por Tipos De Solicitude
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 200%"> {{ __('SERVICIO POR TIPO DE SOLICITUD') }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('servicios-por-tipos-de-solicitudes.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('servicios-por-tipos-de-solicitude.form')
                            @include('sweetalert::alert')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
