<div class="container " style="margin-left:25px">
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <div class="row">
        <div class="d-flex" style="margin-top: 2%; margin-bottom: 2%">

            <div class="col-md-4 file">
                {{ Form::label('', 'Seleccionar imagen',['class' => 'labelFile', 'style' => 'font-size: 18px; font-weight: bold', 'for' => 'logo']) }}
                <label for="logo" class="file-label">
                <input  type="file" name="logo" id="logo"
                    class="form-control-file{{ $errors->has('logo') ? ' is-invalid' : '' }}"><span class="btnCED">
                        Elegir archivo
                        <i class="fas fa-image iconCDE"></i>
                    </span>
                {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
            </label>
            </div>



            
            @if (Route::currentRouteName() === 'personalizaciones.create')
                <div id="imagePreview">
                    <div class="image-wraper">
                    <img id="logoImage" class="img-thumbnail" alt="Preview">
                </div>
                </div>
            @endif
            @if (Route::currentRouteName() === 'personalizaciones.edit')
                <div class="col-md-8" style="margin-bottom: 15px;">
                    <label for="logo" style="font-size: 18px; font-weight: bold; ">Logo</label>
                    <!-- Agrega la etiqueta img con el ID 'qrImage' -->
                    <div class="image-wraper">
                    
                    <img id="logoImage"
                        src="{{ $personalizacione->logo ? 'data:image/png;base64,' . base64_encode($personalizacione->logo) : '' }}"
                        alt="LOGO" 
                        class="img-thumbnail">
                    </div>
                </div>
            @endif
            <!-- <div class="col-md-6">
            {{ Form::label('color_principal', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_principal', $personalizacione->color_principal, ['class' => 'form-control' . ($errors->has('color_principal') ? ' is-invalid' : ''), 'placeholder' => 'Color Principal', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_principal', '<div class="invalid-feedback">:message</div>') !!}
            </div> -->
        </div>
        <div class="row " style="margin-top: 2%; margin-bottom: 2%">

            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <label style="font-size: 18px; font-weight: bold; ">Color
                    principal</label>
                <input style="border-radius:5px; border:1px solid #eaeaea;background:#fff; padding: calc(0.667* 16px) calc(2.667* 16px) calc(0.667* 16px) calc(0.667* 16px);" id="color-picker-principal" name="color_principal"
                    value="{{ $personalizacione->color_principal }}" />
            </div>

            <div class="col-lg-4 col-md-12  col-sm-12 col-12">
                <!-- Input para el color picker -->
            <label style="font-size: 18px; font-weight: bold;">Color
                Secundario</label>
            <input style="border-radius:5px; border:1px solid #eaeaea;background:#fff; padding: calc(0.667* 16px) calc(2.667* 16px) calc(0.667* 16px) calc(0.667* 16px);" id="color-picker-principal"  id="color-picker-secundario" name="color_secundario"
                value="{{ $personalizacione->color_secundario }}" />
            </div>

            <div class=" col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- Input para el color picker -->
            <label style="font-size: 18px; font-weight: bold; ">Color
                Terciario</label>
            <input style="border-radius:5px; border:1px solid #eaeaea;background:#fff; padding: calc(0.667* 16px) calc(2.667* 16px) calc(0.667* 16px) calc(0.667* 16px);" id="color-picker-principal" id="color-picker-terciario" name="color_terciario"
                value="{{ $personalizacione->color_terciario }}" />
            </div>
        </div>
        <!-- <div class="col-md-6">
            {{ Form::label('color_secundario', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_secundario', $personalizacione->color_secundario, ['class' => 'form-control' . ($errors->has('color_secundario') ? ' is-invalid' : ''), 'placeholder' => 'Color Secundario', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_secundario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-6">
            {{ Form::label('color_terciario', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('color_terciario', $personalizacione->color_terciario, ['class' => 'form-control' . ($errors->has('color_terciario') ? ' is-invalid' : ''), 'placeholder' => 'Color Terciario', 'style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('color_terciario', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        @if (Route::currentRouteName() === 'personalizaciones.edit')
            <div class="col-md-6">
                <label for="id_estado" style="font-size: 18px; font-weight: bold;">Estado</label>
                <div style="position: relative;">
                    <select
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar Estado" required>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}"
                                {{ ($personalizacione->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
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
    <div class="box-footer mt20" style="text-align: right; margin-right:3%;">
        <button type="submit" class="btnGuardar" href="{{ route('personalizaciones.create') }}"
           
            >{{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i></button>
    </div>
</div>
