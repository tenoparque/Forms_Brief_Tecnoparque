@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Eventos Especiales Por Categoria
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
                                <h1 class="primeraPalabraFlex" style="font-size:200%">{{ __('EDITAR EVENTO') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size:200%">{{ __('ESPECIALES POR CATEGORIA') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('eventos-especiales-por-categorias.update', $eventosEspecialesPorCategoria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('eventos-especiales-por-categoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
