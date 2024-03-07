@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Categorias Eventos Especiale
@endsection

@section('content')


    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('CREAR CATEGORIA') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE EVENTOS ESPECIALES') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-eventos-especiales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('categorias-eventos-especiale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
