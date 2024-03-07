@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Eventos Especiales Por Categoria
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
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
