<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold;bold; margin-left: 35px;']) }}
            {{ Form::text('nombre', $estadosDeLasSolictude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;  margin-left: 25px; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        @if (Route::currentRouteName() === 'estados-de-las-solictudes.create')
        <div class="form-group">
            {{ Form::label('orden_mostrado', null, ['style' => 'font-size: 18px; font-weight: bold;bold; margin-left: 35px;']) }}
            {{ Form::number('orden_mostrado', $ultimoOrdenMostrado + 1, ['class' => 'form-control', 'readonly' => true, 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;  margin-left: 25px; margin-bottom: 10px;']) }}
        </div>
        @endif

        @if (Route::currentRouteName() === 'estados-de-las-solictudes.edit')
        
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold;bold; margin-left: 35px;" for="id_estado">Estado</label>
                <div style="position: relative;">
                    <select name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar Estado" required
                        style="width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;  margin-left: 25px; margin-bottom: 10px;">
                        @foreach ($estados as $estado)
                           
                            <option value="{{ $estado->id }}"
                                {{ ($estadosDeLasSolictude->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option> 
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
                </div>
        @endif

    </div>
    <div class="box-footer mt20" style="text-align: right;margin-right:3%;">
        <button type="submit" class="btnGuardar">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR" style="color: #642c78;"></i>
        </button>
    </div>
</div>
