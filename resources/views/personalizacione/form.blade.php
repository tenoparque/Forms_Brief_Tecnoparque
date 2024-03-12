<div class="container">
    <div class="row">
        
        <div class="col-md-6" style="margin-bottom: 15px">
            {{ Form::label('logo', 'Seleccionar imagen') }}
            <input type="file" name="logo" id="logo" class="form-control-file{{ $errors->has('logo') ? ' is-invalid' : '' }}">
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'personalizaciones.create')
        <div id="imagePreview">
            <img id="logoImage" class="img-thumbnail" alt="Preview" style="max-width: 300px; max-height: 300px;">
        </div>
        @endif
        @if(Route::currentRouteName() === 'personalizaciones.edit')
        <div class="form-group">
            <label for="logo" style="font-size: 18px; font-weight: bold; margin-bottom: 15px">Imagen QR:</label>
            <!-- Agrega la etiqueta img con el ID 'qrImage' -->
            <img id="logoImage" src="{{ $personalizacione->logo ? 'data:image/png;base64,' . base64_encode($personalizacione->logo) : '' }}" alt="LOGO" width="200">
        </div>
        @endif
        <!-- <div class="col-md-6">
            {{ Form::label('color_principal',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_principal', $personalizacione->color_principal, ['class' => 'form-control' . ($errors->has('color_principal') ? ' is-invalid' : ''), 'placeholder' => 'Color Principal','style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_principal', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->

        <!-- Input para el color picker -->
        <label>Color principal</label>
        <input id="color-picker-principal" name="color_principal" value="{{ $personalizacione->color_principal }}" />

        <!-- Input para el color picker -->
        <label>Color Secundario</label>
        <input id="color-picker-secundario" name="color_secundario" value="{{ $personalizacione->color_secundario }}" />

        <!-- Input para el color picker -->
        <label>Color Terciario</label>
        <input id="color-picker-terciario" name="color_terciario" value="{{ $personalizacione->color_terciario }}" />


        <!-- <div class="col-md-6">
            {{ Form::label('color_secundario',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_secundario', $personalizacione->color_secundario, ['class' => 'form-control' . ($errors->has('color_secundario') ? ' is-invalid' : ''), 'placeholder' => 'Color Secundario','style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_secundario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-6">
            {{ Form::label('color_terciario',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_terciario', $personalizacione->color_terciario, ['class' => 'form-control' . ($errors->has('color_terciario') ? ' is-invalid' : ''), 'placeholder' => 'Color Terciario','style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_terciario', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        @if(Route::currentRouteName() === 'personalizaciones.edit')
        <div class="col-md-6">
        <label for="id_estado" style="font-size: 18px; font-weight: bold">Estado</label>
        <select name="id_estado" id="id_estado" class="form-control selectpicker"
        data-style="btn-primary" title="Seleccionar Estado" required>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}" {{ ($personalizacione->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                    {{ $estado->nombre }}
                </option>
            @endforeach
        </select>
        </div>
        @endif


        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var logoInput = document.getElementById('logo');
            var logoImage = document.getElementById('logoImage');

            logoInput.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    logoImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        });
        </script>

        <script type="text/javascript">
            $(document).ready(function($) {
                $('#color-picker-principal, #color-picker-secundario, #color-picker-terciario').spectrum({
                    type: "component",
                    showInput: true,
                    showAlpha: false,
                    change: function(color) {
                        // Actualiza el valor del input cuando cambia el color
                        $(this).val(color.toString());
                    }
                });
            });
        </script>

        <!-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Agregar evento click al botón "Guardar"
                document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
                    // Obtener el valor actual del campo de color principal
                    var colorPrincipal = document.getElementById('color-picker').value;

                    // Mostrar una alerta con el valor actual del color principal
                    alert('El valor actual del color principal es: ' + colorPrincipal);

                    // Si deseas detener el envío del formulario para realizar más pruebas, descomenta la siguiente línea
                    // event.preventDefault();
                });
            });
        </script> -->



        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var logoInput = document.getElementById('logo');
            var logoImage = document.getElementById('logoImage');

            logoInput.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    logoImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        });
        </script>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('personalizaciones.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; " 
        onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>

