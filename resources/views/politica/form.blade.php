<div class="container">
    <div class="row">
        
        <div class="col-md-6">
            {{ Form::label('link',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::url('link', $politica->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa Link','style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-6">
            {{ Form::label('descripcion',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('descripcion', $politica->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'politicas.edit')
            <div class="col-md-6">
                <label for="id_estado" style="font-size: 18px; font-weight:bold">Estado</label>
                <select name="id_estado" id="id_estado" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Estado" required style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;border-color: #ececec;background:#ececec;">
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ ($politica->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="col-md-6">
            {{ Form::label('titulo',null, ['style' => 'font-size: 18px; font-weight: bold;border-radius: 35px;']) }}
            {{ Form::text('titulo', $politica->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo','style' => 'width: 100%;height:45px; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec;background:#ececec; margin-bottom: 10px;']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group inputFilePoli">
            <div class="file">
                
                {{ Form::label('qr', 'Elige una imagen',['class'=>'labelFile','style' => 'font-size: 18px; font-weight: bold','for' => 'qr']) }}
                
                <input type="file" name="qr" id="qr" class="form-control-file{{ $errors->has('qr') ? ' is-invalid' : '' }}" style="background:#4a4a">
                {!! $errors->first('qr', '<div class="invalid-feedback">:message</div>') !!}
               
            </div>
        </div>
        @if(Route::currentRouteName() === 'politicas.create')
        <div id="imagePreview">
            <img id="qrImage" class="img-thumbnail" alt="Preview" >
        </div>
        @endif
        @if(Route::currentRouteName() === 'politicas.edit')
        <div class="form-group">
            <label for="qr"></label>
            <!-- Agrega la etiqueta img con el ID 'qrImage' -->
            <img id="qrImage" src="{{ $politica->qr ? 'data:image/png;base64,' . base64_encode($politica->qr) : '' }}" alt="QR" style="max-width: 812px; max-height: 464px;">
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
                };

                reader.readAsDataURL(input.files[0]);
            });
        </script>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('politicas.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; " onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>