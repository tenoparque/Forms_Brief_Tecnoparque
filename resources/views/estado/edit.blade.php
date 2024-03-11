@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Estado
@endsection

@section('content')
    <section class="container shadow bg-light mt-5">
        <div class="row p-3">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="d-flex mt-3 mb-4">
                        <div>
                            <h1 class="primeraPalabraFlex" style="margin-right: 10px; font-size:180%">{{ __('EDITAR') }}</h1>
                        </div>
                        <div>
                            <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('ESTADO') }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados.update', $estado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
