<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('nombre', $serviciosPorTiposDeSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre',
            'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.create')
        <div class="form-group">
            <label style="font-size: 18px; font-weight: bold"for="id_tipo_de_solicitud" >Tipo de Solicitud</label>
            <select name="id_tipo_de_solicitud" id="id_tipo_de_solicitud" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar Tipo de Solicitud" required>
                @foreach ($solicitudes as $solicitud )
                <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                    <option value="{{ $solicitud->id }}">{{ $solicitud-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        @endif

        @if(Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold" for="id_tipo_de_solicitud">Tipo de Solicitud</label>
                <select name="id_tipo_de_solicitud" id="id_tipo_de_solicitud" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Tipo de Solicitud" required>
                    @foreach ($solicitudes as $solicitud)
                        <option value="{{ $solicitud->id }}" {{ ($serviciosPorTiposDeSolicitude->id_tipo_de_solicitud ?? '') == $solicitud->id ? 'selected' : '' }}>
                            {{ $solicitud->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        @if(Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold" for="id_estado">Estado</label>
                <select name="id_estado" id="id_estado" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar el Estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ ($serviciosPorTiposDeSolicitude->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif




    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('roles.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; " 
        onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>