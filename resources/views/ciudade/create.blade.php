@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Ciudade
@endsection

@section('content')


    <section class="container  shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class = "text-start">
                
                    <div class="d-flex">
                        <div class="">
                            <h1 class="primeraPalabraFlex" style="font-size: 180%">{{ __('CREAR') }}</h1>
                        </div>
                        <div class="">
                            <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('CIUDAD') }}</h1>
                        </div>
            
                    </div>
                    <div>
                        <form method="POST" class="row" action="{{ route('ciudades.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ciudade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
