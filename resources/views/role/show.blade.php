@extends('layouts.app')

@section('template_title')
    {{ $role->name ?? "__('Show') Role" }}
@endsection

@section('content')

    <section class="content container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 180%" >{{ __('DETALLES') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 180%">{{ __('DEL ROL') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                        <div class="form-group">
                            <strong>Guard Name:</strong>
                            {{ $role->guard_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
