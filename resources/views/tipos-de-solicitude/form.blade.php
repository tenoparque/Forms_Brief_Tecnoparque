<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px']) }}
            {{ Form::text('nombre', $tiposDeSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec;  margin-left: 25px; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'tipos-de-solicitudes.edit')
            <div class="form-group">
                <label for="id_estado" style="font-size: 18px; font-weight: bold">Estado</label>
                <select name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                    title="Seleccionar Estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}"
                            {{ ($tiposDeSolicitude->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    <div class="box-footer mt20" style="text-align: right;">
        <button type="submit" class="btn btn-outline"
            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; margin-right: 40px;"
            onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i>
        </button>
    </div>
</div>
