@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Nodo
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
                                <h1 class="primeraPalabraFlex" style="font-size: 200%" >{{ __('CREAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('NODO') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nodos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('nodo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
