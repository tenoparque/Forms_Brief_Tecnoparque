<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_soli') }}
            {{ Form::text('id_soli', $historialDeModificacionesPorSolicitude->id_soli, ['class' => 'form-control' . ($errors->has('id_soli') ? ' is-invalid' : ''), 'placeholder' => 'Id Soli']) }}
            {!! $errors->first('id_soli', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modificacion') }}
            {{ Form::text('modificacion', $historialDeModificacionesPorSolicitude->modificacion, ['class' => 'form-control' . ($errors->has('modificacion') ? ' is-invalid' : ''), 'placeholder' => 'Modificacion']) }}
            {!! $errors->first('modificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_de_modificacion') }}
            {{ Form::text('fecha_de_modificacion', $historialDeModificacionesPorSolicitude->fecha_de_modificacion, ['class' => 'form-control' . ($errors->has('fecha_de_modificacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha De Modificacion']) }}
            {!! $errors->first('fecha_de_modificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>