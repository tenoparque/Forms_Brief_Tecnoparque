<div class="container">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <div class="row">

        <div class="col-md-6">
            {{ Form::label('link', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::url('link', $politica->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa Link', 'style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-6">
            {{ Form::label('descripción', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('descripción', $politica->descripcion, ['class' => 'form-control' . ($errors->has('descripción') ? ' is-invalid' : ''), 'placeholder' => 'Descripción', 'style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'politicas.edit')
            <div class="col-md-6">
                <label for="id_estado" style="font-size: 18px; font-weight:bold">Estado</label>
                <div style="position: relative;">
                    <select name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar Estado" required
                        style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;border-color: #ececec;background:#ececec;">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}"
                                {{ ($politica->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <div class="icono" style="right: 2%">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-6">
            {{ Form::label('título', null, ['style' => 'font-size: 18px; font-weight: bold;border-radius: 35px;']) }}
            {{ Form::text('título', $politica->titulo, ['class' => 'form-control' . ($errors->has('título') ? ' is-invalid' : ''), 'placeholder' => 'Título', 'style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-md-6">
            <div class="form-group inputSelectImage" style="margin-top: 30px">
                <div class="file">
                    {{ Form::label('', '', ['class' => 'labelFile', 'style' => 'font-size: 18px; font-weight: bold', 'for' => 'qr']) }}
                    <label for="qr" class="file-label">
                        <input type="file" name="qr" id="qr"
                            class="form-control-file{{ $errors->has('qr') ? ' is-invalid' : '' }}"
                            style="display: none;">
                        <span class="btnCED">
                            Subir Imagen
                            <i class="fas fa-image iconCDE"></i>
                        </span>
                        {!! $errors->first('qr', '<div class="invalid-feedback">:message</div>') !!}
                    </label>
                </div>

                <div id="imageUrl"></div>

            </div>
            @if (Route::currentRouteName() === 'politicas.create')
                <div id="imagePreview">
                    <div class="image-wraper">
                        <img id="qrImage" class="img-thumbnailQr" alt="Preview">
                    </div>
                </div>
            @endif
            @if (Route::currentRouteName() === 'politicas.edit')
                <div class="form-group">
                    <label for="qr"></label>
                    <div class="image-wraper">

                        <!-- Agrega la etiqueta img con el ID 'qrImage' -->
                        <img id="qrImage" class="img-thumbnailQr"
                            src="{{ $politica->qr ? 'data:image/png;base64,' . base64_encode($politica->qr) : '' }}"
                            alt="QR" id="qrImage">
                    </div>
                </div>
            @endif

            <!-- Mostrar imagen que se selecciona en edit -->
            <script>
                document.getElementById('qr').addEventListener('change', function(event) {
                    var input = event.target;
                    var reader = new FileReader();

                    reader.onload = function() {
                        var dataURL = reader.result;
                        var img = document.getElementById('qrImage');
                        img.src = dataURL;

                        // Obtener solo el nombre del archivo
                        var fileName = input.files.length > 0 ? input.files[0].name : '';

                        // Actualizar el contenido en el elemento con el ID 'imageUrl'
                        var imageUrlContainer = document.getElementById('imageUrl');
                        if (imageUrlContainer) {
                            imageUrlContainer.innerHTML = 'Nombre de la imagen: ' + fileName;
                        }

                        // Limpiar el mensaje si no se ha seleccionado ningún archivo
                        var noFileMessage = document.getElementById('noFileMessage');
                        if (noFileMessage) {
                            noFileMessage.textContent = '';
                        }
                    };

                    reader.readAsDataURL(input.files[0]);
                });
            </script>

        </div>
        <div class="box-footer mt20" style="text-align: right; margin-right:3%;">
            <button type="submit" class="btnGuardar" href="{{ route('politicas.create') }}"
                class="btnGuardar">{{ __('GUARDAR') }}
                <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i></button>
        </div>
    </div>
