@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Personalizacione
@endsection

@section('content')
    <section class="container shadow bg-light p-4 mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="d-flex mt-3 mb-4">
                        <div class="">
                            <h1 class="primeraPalabraFlex">{{ __('Crear') }}</h1>
                        </div>
                        <div>
                            <h1 class="segundaPalabraFlex">{{ __(' Personalizaciones')}}</h1>
                        </div>
                    </div>

                    <div class="">
                        <form method="POST" action="{{ route('personalizaciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('personalizacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
