<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('nombre', $ciudade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre',
             'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'ciudades.create')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold" for="id_departamento">Departamento</label>
                <select name="id_departamento" id="id_departamento" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Departamento" required >
                    @foreach ($departamentos as $departamento)
                    <!-- We go through the models of the Departamentos that we previously passed through the controller -->
                        <option value="{{ $departamento->id }}">{{ $departamento-> nombre }}</option> <!-- We obtain the id and the value -->
                    @endforeach
                </select>
            </div>
        @endif

        @if(Route::currentRouteName() === 'ciudades.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold" for="id_departamento">Departamento</label>
                <select name="id_departamento" id="id_departamento" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Departamento" required >
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" {{ ($ciudade->id_departamento ?? '') == $departamento->id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

    </div>
    <div class="box-footer mt20" style="text-align: right;">
        <button type="submit" class="btn btn-outline"
            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; margin-left: 0;" 
            onmouseover="this.style.backgroundColor='#b2ebf2';"
            onmouseout="this.style.backgroundColor='#FFFF';">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i>
        </button>
    </div>
</div>