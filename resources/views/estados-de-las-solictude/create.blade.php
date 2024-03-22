@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Estados De Las Solictude
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('ESTADO DE LA SOLICITUD') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados-de-las-solictudes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estados-de-las-solictude.form')
                            @include('sweetalert::alert')

                            




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
