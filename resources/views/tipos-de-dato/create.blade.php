@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tipos De Dato
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

<section class="container  shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class = "text-start">
                
                    <div class="d-flex">
                        <div class="">
                            <h1 class="primeraPalabraFlex">{{ __('TIPO DE') }}</h1>
                        </div>
                        <div class="">
                            <h1 class="segundaPalabraFlex">{{ __('DATO') }}</h1>
                        </div>
            
                    </div>
                    <div>
                        <form method="POST" class="row" action="{{ route('tipos-de-datos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipos-de-dato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
