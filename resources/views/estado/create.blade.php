@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Estado
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

  
    <section class="content shadow bg-light container mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <span id="">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 20px">{{ __('CREAR') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex">{{ __('ESTADO') }}</h1>
                                </div>
                            </div>
                        </span>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
