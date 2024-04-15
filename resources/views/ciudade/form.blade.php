<div class="box box-info padding-1">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px; ']) }}
            {{ Form::text('nombre', $ciudade->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-left: 25px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'ciudades.create')
            <div class="form-group">

                <label style="font-size: 18px; font-weight: bold; margin-left: 35px;"
                    for="id_departamento">Departamento</label>
                <div style="position: relative;">

                    <select name="id_departamento" id="id_departamento" class="form-control selectpicker"
                        data-style="btn-primary" title="Seleccionar Departamento" required
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar Departamento...</option>
                        @foreach ($departamentos as $departamento)
                            <!-- We go through the models of the Departamentos that we previously passed through the controller -->
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
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
        @if (Route::currentRouteName() === 'ciudades.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold; margin-left: 35px;"
                    for="id_departamento">Departamento</label>
                <div style="position: relative;">
                    <select
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        name="id_departamento" id="id_departamento" class="form-control">
                        </option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ ($ciudade->id_departamento ?? '') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    </div>
    <div class="box-footer mt20" style="text-align: right;margin-right:3%;">
        <button type="submit" class="btnGuardar"
            >
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i>
        </button>
    </div>
</div>
</div>
