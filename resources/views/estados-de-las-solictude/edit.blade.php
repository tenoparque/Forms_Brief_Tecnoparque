@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Estados De Las Solictude
@endsection

@section('content')

    <section class="container shadow bg-light mt-5 p-4 rounded">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="">
                    <div class="">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('EDITAR EL') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('ESTADO DE LA SOLICITUD') }}</h1>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados-de-las-solictudes.update', $estadosDeLasSolictude->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estados-de-las-solictude.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
