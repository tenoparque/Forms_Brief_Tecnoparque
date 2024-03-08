@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Nodo
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
                        <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('NODOS') }}</h1>
                    </div>
        
                </div>
                <div>
                    <form method="POST" class="row" action="{{ route('nodos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('nodo.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
