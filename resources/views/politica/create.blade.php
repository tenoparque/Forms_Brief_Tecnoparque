@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Politica
@endsection

@section('content')


    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex">{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex">{{ __('POLÍTICA') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('politicas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('politica.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
