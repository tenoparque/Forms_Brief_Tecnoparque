<section class="container shadow p-3  my-5 bg-light rounded">

    <div class="d-flex" style="margin-bottom: 10px">
        <div class="">
            <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('EDITAR') }}</h1>
        </div>
        <div class="">
            <h1 class="segundaPalabraFlex" style="font-size: 200%;">{{ __('USUARIOS') }}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('nombre', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('correo' , null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('correo', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px']) }}
                {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('celular', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('celular', $user->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6']) }}
                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('apellidos', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos', 'style' => 'width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px']) }}
                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('nodo', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('nodo', $user->id_nodo, ['class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''), 'placeholder' => 'Nodo', 'style' => 'margin-bottom: 10px']) }}
                {!! $errors->first('id_nodo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('estado', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('estado', $user->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }} 
                {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt20" style="text-align: right;">
        <button type="submit" class="btn btn-outline"
            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; margin-left: 0;"
            onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i>
        </button>
    </div>
</section>
