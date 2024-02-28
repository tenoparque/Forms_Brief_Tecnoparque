<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('logo') }}
            {{ Form::text('logo', $personalizacione->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_principal') }}
            {{ Form::text('color_principal', $personalizacione->color_principal, ['class' => 'form-control' . ($errors->has('color_principal') ? ' is-invalid' : ''), 'placeholder' => 'Color Principal']) }}
            {!! $errors->first('color_principal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_secundario') }}
            {{ Form::text('color_secundario', $personalizacione->color_secundario, ['class' => 'form-control' . ($errors->has('color_secundario') ? ' is-invalid' : ''), 'placeholder' => 'Color Secundario']) }}
            {!! $errors->first('color_secundario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_terciario') }}
            {{ Form::text('color_terciario', $personalizacione->color_terciario, ['class' => 'form-control' . ($errors->has('color_terciario') ? ' is-invalid' : ''), 'placeholder' => 'Color Terciario']) }}
            {!! $errors->first('color_terciario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_users') }}
            {{ Form::text('id_users', $personalizacione->id_users, ['class' => 'form-control' . ($errors->has('id_users') ? ' is-invalid' : ''), 'placeholder' => 'Id Users']) }}
            {!! $errors->first('id_users', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_estado') }}
            {{ Form::text('id_estado', $personalizacione->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : ''), 'placeholder' => 'Id Estado']) }}
            {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>