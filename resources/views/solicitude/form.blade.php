<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_tipos_de_solicitudes') }}
            {{ Form::text('id_tipos_de_solicitudes', $solicitude->id_tipos_de_solicitudes, ['class' => 'form-control' . ($errors->has('id_tipos_de_solicitudes') ? ' is-invalid' : ''), 'placeholder' => 'Id Tipos De Solicitudes']) }}
            {!! $errors->first('id_tipos_de_solicitudes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_y_hora_de_la_solicitud') }}
            {{ Form::text('fecha_y_hora_de_la_solicitud', $solicitude->fecha_y_hora_de_la_solicitud, ['class' => 'form-control' . ($errors->has('fecha_y_hora_de_la_solicitud') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Y Hora De La Solicitud']) }}
            {!! $errors->first('fecha_y_hora_de_la_solicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario_que_realiza_la_solicitud') }}
            {{ Form::text('id_usuario_que_realiza_la_solicitud', $solicitude->id_usuario_que_realiza_la_solicitud, ['class' => 'form-control' . ($errors->has('id_usuario_que_realiza_la_solicitud') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario Que Realiza La Solicitud']) }}
            {!! $errors->first('id_usuario_que_realiza_la_solicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_eventos_especiales_por_categorias') }}
            {{ Form::text('id_eventos_especiales_por_categorias', $solicitude->id_eventos_especiales_por_categorias, ['class' => 'form-control' . ($errors->has('id_eventos_especiales_por_categorias') ? ' is-invalid' : ''), 'placeholder' => 'Id Eventos Especiales Por Categorias']) }}
            {!! $errors->first('id_eventos_especiales_por_categorias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_estado_de_la_solicitud') }}
            {{ Form::text('id_estado_de_la_solicitud', $solicitude->id_estado_de_la_solicitud, ['class' => 'form-control' . ($errors->has('id_estado_de_la_solicitud') ? ' is-invalid' : ''), 'placeholder' => 'Id Estado De La Solicitud']) }}
            {!! $errors->first('id_estado_de_la_solicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>