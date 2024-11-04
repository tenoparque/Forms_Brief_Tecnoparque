<div class="box box-info padding-1">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <div class="box-body">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px']) }}
            {{ Form::text('nombre', $nodo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-left: 25px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'nodos.create')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold; margin-left: 35px"
                    for="id_departamento">Departamento</label>
                <div style="position: relative;">
                    <select id="id_departamento" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar el Departamento" required
                        style="width: 95%; height: 45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top: 8px; margin-left: 25px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar Departamento...</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%;">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold; margin-left: 35px" for="id_ciudad">Ciudad</label>
                <div style="position: relative;">
                    <select name="id_ciudad" id="id_ciudad" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar la Ciudad" required
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar Ciudad...</option>
                        @foreach ($departamentos as $departamento)
                            @foreach ($departamento->ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" data-departamento="{{ $departamento->id }}">
                                    {{ $ciudad->nombre }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%;">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('id_departamento').addEventListener('change', function() {
                    var selectedDepartamento = this.value;
                    var ciudadSelect = document.getElementById('id_ciudad');

                    // Ocultar todas las opciones primero
                    for (var i = 0; i < ciudadSelect.options.length; i++) {
                        var option = ciudadSelect.options[i];
                        if (option.getAttribute('data-departamento') === selectedDepartamento) {
                            option.style.display = 'block'; // Mostrar si pertenece al departamento seleccionado
                        } else {
                            option.style.display = 'none'; // Ocultar si no pertenece
                        }
                    }
                    ciudadSelect.value = ''; // Reiniciar la selección de ciudad
                });
            </script>
        @endif
        @if (Route::currentRouteName() === 'nodos.edit')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold; margin-left: 35px"
                    for="id_departamento">Departamento</label>
                <div style="position: relative;">
                    <select id="id_departamento" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar el Departamento" required
                        style="width: 95%; height: 45px; border-radius: 50px; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top: 8px; margin-left: 25px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar Departamento...</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%;">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold; margin-left: 35px" for="id_ciudad">Ciudad</label>
                <div style="position: relative;">
                    <select name="id_ciudad" id="id_ciudad" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar la Ciudad" required
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option value="" disabled selected>Seleccionar Ciudad...</option>
                        @foreach ($departamentos as $departamento)
                            @foreach ($departamento->ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" data-departamento="{{ $departamento->id }}">
                                    {{ $ciudad->nombre }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%;">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('id_departamento').addEventListener('change', function() {
                    var selectedDepartamento = this.value;
                    var ciudadSelect = document.getElementById('id_ciudad');

                    // Ocultar todas las opciones primero
                    for (var i = 0; i < ciudadSelect.options.length; i++) {
                        var option = ciudadSelect.options[i];
                        if (option.getAttribute('data-departamento') === selectedDepartamento) {
                            option.style.display = 'block'; // Mostrar si pertenece al departamento seleccionado
                        } else {
                            option.style.display = 'none'; // Ocultar si no pertenece
                        }
                    }
                    ciudadSelect.value = ''; // Reiniciar la selección de ciudad
                });
            </script>
        @endif
        @if (Route::currentRouteName() === 'nodos.edit')
            <div class="col-md-6">
                <div class="form-group">

                    <label style="font-size: 18px; font-weight: bold; margin-left: 35px" for="id_estado">Estado</label>
                    <div style="position: relative">
                        <select name="id_estado" id="id_estado" class="form-control selectpicker"
                            data-style="btn-primary" title="Seleccionar Estado" required
                            style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}"
                                    {{ ($nodo->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <div class="icono" style="right: 7%">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endif
</div>
<div class="box-footer mt20" style="display: flex; justify-content: space-between; margin: 0 3%;">
    <button type="button" class="btnGuardar" onclick="window.history.back()">
        {{ __('REGRESAR') }}
        <i class="fa-solid fa-arrow-left fa-sm iconDCR"></i>
    </button>

    <button type="submit" class="btnGuardar">
        {{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i>
    </button>
</div>



</div>
