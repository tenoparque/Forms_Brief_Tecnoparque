@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Solicitude
@endsection

@section('content')

    <section class="container mb-5">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class=" mt-5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicitudes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('solicitude.form')
                        </form>
                    </div>
                    
            </div>
        </div>
    </section>
@endsection
