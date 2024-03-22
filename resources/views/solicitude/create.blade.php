@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Solicitude
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="card-body">
                            <form method="POST" action="{{ route('solicitudes.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @include('solicitude.form')
                                @include('sweetalert::alert')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
