<div class="form-group">
    {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px']) }}
    {{ Form::text('nombre', $tiposDeDato->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-left: 25px;']) }}
    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
</div>
@if (Route::currentRouteName() === 'tipos-de-datos.edit')
    <div class="form-group">
        <label style="font-size: 18px; font-weight: bold; margin-left: 35px" for="id_estado">Estado</label>
        <div style="position: relative;">
            <select name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                title="Seleccionar Estado" required
                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}"
                        {{ ($tiposDeDato->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
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


<div class="box-footer mt20"  style="text-align: right; margin-right:3%;">
    <button type="submit" class="btnDCR">
        {{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i>
    </button>
</div>
