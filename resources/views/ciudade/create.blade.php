@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Ciudade
@endsection

@section('content')

    <section class="container  shadow p-4  my-5 bg-light rounded">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class = "">
                    <div class="d-flex mt-3 mb-4">
                        <div>
                            <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('CREAR') }}</h1>
                        </div>
                        <div>
                            <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('CIUDAD') }}</h1>
                        </div>
                    </div>
                    <div>
                        <form method="POST" class="row" action="{{ route('ciudades.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('ciudade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
