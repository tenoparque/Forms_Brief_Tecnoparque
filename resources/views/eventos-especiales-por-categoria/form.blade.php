<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; margin-left: 35px; font-weight: bold']) }}
            {{ Form::text('nombre', $eventosEspecialesPorCategoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;margin-left: 25px; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'eventos-especiales-por-categorias.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold;margin-left: 35px;" for="id_estado">Estado</label>
                <div style="position: relative;">
                    <select
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar Estado" required>
                       @foreach ($estados as $estado)
                        <!-- We go through the models of the estados that we previously passed through the controller -->
                        <option value="{{ $estado->id }}"
                            {{ ($eventosEspecialesPorCategoria->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option> <!-- We obtain the id and the value -->
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
@if (Route::currentRouteName() === 'eventos-especiales-por-categorias.create')
    <div class="form-group">
        <label style="font-size: 18px; font-weight: bold; margin-left: 35px;"
            for="id_eventos_especiales">Categoria</label>
        <div style="position: relative;">
            <select
                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                name="id_eventos_especiales" id="id_eventos_especiales" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Categoria" required ">
            <option value="" disabled selected>Seleccionar categoría...</option>
             @foreach ($categorias as $categoria)
                <!-- We go through the models of the categorias that we previously passed through the controller -->
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                <!-- We obtain the id and the value -->
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
@if (Route::currentRouteName() === 'eventos-especiales-por-categorias.edit')
    <div class="form-group">
        <label style="font-size: 18px; font-weight: bold; margin-left: 35px;"
            for="id_eventos_especiales">Categoria</label>
        <div style="position: relative;">
            <select
                style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                name="id_eventos_especiales" id="id_eventos_especiales" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Categoria" required>
             @foreach ($categorias as $categoria)
                <!-- We go through the models of the categorias that we previously passed through the controller -->
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                <!-- We obtain the id and the value -->
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
<div class="box-footer mt20" style="text-align: right; margin-right:3%;">
    <button type="submit" class="btnGuardar">
        {{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i>
    </button>
</div>
</div>
