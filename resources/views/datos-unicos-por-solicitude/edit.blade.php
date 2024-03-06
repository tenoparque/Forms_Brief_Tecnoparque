@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Datos Unicos Por Solicitude
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('EDITAR DATO UNICO') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size:180%">{{ __('POR TIPO DE SOLICITUD') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('datos-unicos-por-solicitudes.update', $datosUnicosPorSolicitude->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('datos-unicos-por-solicitude.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
