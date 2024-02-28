<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_solicitudes') }}
            {{ Form::text('id_solicitudes', $datosPorSolicitud->id_solicitudes, ['class' => 'form-control' . ($errors->has('id_solicitudes') ? ' is-invalid' : ''), 'placeholder' => 'Id Solicitudes']) }}
            {!! $errors->first('id_solicitudes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_datos_unicos_por_solicitudes') }}
            {{ Form::text('id_datos_unicos_por_solicitudes', $datosPorSolicitud->id_datos_unicos_por_solicitudes, ['class' => 'form-control' . ($errors->has('id_datos_unicos_por_solicitudes') ? ' is-invalid' : ''), 'placeholder' => 'Id Datos Unicos Por Solicitudes']) }}
            {!! $errors->first('id_datos_unicos_por_solicitudes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dato') }}
            {{ Form::text('dato', $datosPorSolicitud->dato, ['class' => 'form-control' . ($errors->has('dato') ? ' is-invalid' : ''), 'placeholder' => 'Dato']) }}
            {!! $errors->first('dato', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>