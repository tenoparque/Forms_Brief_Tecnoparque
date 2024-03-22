@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Eventos Especiales Por Categoria
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size:200%" >{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size:200%" >{{ __('EVENTO ESPECIAL POR CATEGORIA') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('eventos-especiales-por-categorias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('eventos-especiales-por-categoria.form')
                            @include('sweetalert::alert')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
