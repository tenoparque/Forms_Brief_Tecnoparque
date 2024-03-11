@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Eventos Especiales Por Categoria
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size:200%" >{{ __('CREAR EVENTO') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" >{{ __('ESPECIAL POR CATEGORIA') }}</h1>
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
