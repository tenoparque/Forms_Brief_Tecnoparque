<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="id_tipos_de_solicitudes">Tipo de Solicitud</label>
            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Tipo de Solicitud" required>
                @foreach ($solicitudes as $solicitud)
                <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                    <option value="{{ $solicitud->id }}">{{ $solicitud-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id">tipos</label>
            <select name="id" id="id" class="form-control selectpicker"
            data-style="btn-primary" title="" required>
                @foreach ($tipos as $estado)
                <!-- We go through the models of the estados that we previously passed through the controller -->
                    <option value="{{ $estado->id_tipos_de_solicitudes}}">{{$estado->nombre}}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
    </div>
   
    
</div>
    
</div>

