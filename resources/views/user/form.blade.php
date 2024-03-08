<section class="container shadow p-3  my-5 bg-light rounded">

    <div>
        <h2>
            <spna class="segundaPalabaraFlex">{{ __('EDITAR') }}</spna>
            <spna class="primeraPalabraFlex">{{ __('USUARIOS ') }}</spna>
        </h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name') }}
                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('celular') }}
                {{ Form::text('celular', $user->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('apellidos') }}
                {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('id_nodo') }}
                {{ Form::text('id_nodo', $user->id_nodo, ['class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''), 'placeholder' => 'Id Nodo']) }}
                {!! $errors->first('id_nodo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('id_estado') }}
                {{ Form::text('id_estado', $user->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : ''), 'placeholder' => 'Id Estado']) }}
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
