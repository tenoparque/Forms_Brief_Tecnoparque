<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $datosUnicosPorSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_tipos_de_datos') }}
            {{ Form::text('id_tipos_de_datos', $datosUnicosPorSolicitude->id_tipos_de_datos, ['class' => 'form-control' . ($errors->has('id_tipos_de_datos') ? ' is-invalid' : ''), 'placeholder' => 'Id Tipos De Datos']) }}
            {!! $errors->first('id_tipos_de_datos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_tipos_de_solicitudes') }}
            {{ Form::text('id_tipos_de_solicitudes', $datosUnicosPorSolicitude->id_tipos_de_solicitudes, ['class' => 'form-control' . ($errors->has('id_tipos_de_solicitudes') ? ' is-invalid' : ''), 'placeholder' => 'Id Tipos De Solicitudes']) }}
            {!! $errors->first('id_tipos_de_solicitudes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_estados') }}
            {{ Form::text('id_estados', $datosUnicosPorSolicitude->id_estados, ['class' => 'form-control' . ($errors->has('id_estados') ? ' is-invalid' : ''), 'placeholder' => 'Id Estados']) }}
            {!! $errors->first('id_estados', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>