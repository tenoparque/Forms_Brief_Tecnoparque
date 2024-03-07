@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tipos De Dato
@endsection

@section('content')

    <section class="content container mt-5">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="d-flex">
                                <div class="">
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('EDITAR') }}</h1>
                                </div>
                                <div class="">
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('TIPO DE DATO') }}</h1>
                                </div>
                    
                            </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipos-de-datos.update', $tiposDeDato->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipos-de-dato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
