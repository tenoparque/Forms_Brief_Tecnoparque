@extends('layouts.app')

@section('template_title')
    {{ $departamento->nombre ?? 'Show Departamento' }}
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size:200%">{{ __('EDITAR') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('DEPARTAMENTO') }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre', ['class' => 'font-weight-bold', 'style' => 'font-size: 18px;']) }}
                            {{ Form::text('nombre', $departamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('id_ciudad', 'Ciudad', ['class' => 'font-weight-bold', 'style' => 'font-size: 18px;']) }}
                            {{ Form::select('id_ciudad', $ciudades, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar Ciudad']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('departamentos.index') }}" class="btn btn-outline"
                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 90%;"
                    onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">
                    {{ __('REGRESAR') }}
                    <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
