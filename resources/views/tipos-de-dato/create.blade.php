@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos De Dato
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class = "">
                
                    <div class="d-flex mt-3 mb-4">
                        <div class="">
                            <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('CREAR') }}</h1>
                        </div>
                        <div class="">
                            <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('TIPO DE DATO') }}</h1>
                        </div>
            
                    </div>
                    <div>
                        <form method="POST" class="row" action="{{ route('tipos-de-datos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipos-de-dato.form')
                            @include('sweetalert::alert')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
