<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_solicitudes') }}
            {{ Form::text('id_solicitudes', $elementosPorSolicitude->id_solicitudes, ['class' => 'form-control' . ($errors->has('id_solicitudes') ? ' is-invalid' : ''), 'placeholder' => 'Id Solicitudes']) }}
            {!! $errors->first('id_solicitudes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_subservicios') }}
            {{ Form::text('id_subservicios', $elementosPorSolicitude->id_subservicios, ['class' => 'form-control' . ($errors->has('id_subservicios') ? ' is-invalid' : ''), 'placeholder' => 'Id Subservicios']) }}
            {!! $errors->first('id_subservicios', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>