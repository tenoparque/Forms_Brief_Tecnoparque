@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Categorias Eventos Especiale
@endsection

@section('content')

    <section class="content container mt-5">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('EDITAR CATEGORIA') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DE EVENTOS ESPECIALES') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias-eventos-especiales.update', $categoriasEventosEspeciale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categorias-eventos-especiale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
