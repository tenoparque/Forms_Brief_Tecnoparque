@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Politica
@endsection

@section('content')

    <section class="container shadow p-4  my-5 bg-light rounded">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 200%" >{{ __('EDITAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('POLÍTICA') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('politicas.update', $politica->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('politica.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
