@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex mt-3 mb-4">
                            <div>
                                <h1 class="primeraPalabraFlex">{{ __('EDITAR') }}</h1>
                            </div>
                            <div>
                                <h1 class="segundaPalabraFlex">{{ __('DEPARTAMENTO') }}</h1>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departamentos.update', $departamento->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('departamento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
