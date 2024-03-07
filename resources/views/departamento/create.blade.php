@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Departamento
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex">
                            <div>
                                <h1 class="primeraPalabraFlex">{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" >{{ __('DEPARTAMENTO') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departamentos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('departamento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
