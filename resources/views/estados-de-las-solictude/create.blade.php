@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Estados De Las Solictude
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex">{{ __('CREAR ESTADO') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex">{{ __('DE LA SOLICITUD') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados-de-las-solictudes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estados-de-las-solictude.form')

                            //aca debe hacer el diseño//




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
