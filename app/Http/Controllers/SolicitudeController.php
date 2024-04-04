<?php

namespace App\Http\Controllers;

use App\Models\CategoriasEventosEspeciale;
use App\Models\DatosPorSolicitud;
use App\Models\DatosUnicosPorSolicitude;
use App\Models\ElementosPorSolicitude;
use App\Models\Estado;
use App\Models\EstadosDeLasSolictude;
use App\Models\EventosEspecialesPorCategoria;
use App\Models\HistorialDeEstadosPorSolicitude;
use App\Models\Historial;
use App\Models\HistorialDeUsuariosPorSolicitude;

use App\Models\Solicitude;
use App\Models\TiposDeDato;
use App\Models\TiposDeSolicitude;
use App\Models\ServiciosPorTiposDeSolicitude; // Añade la importación de la clase ServiciosPorTiposDeSolicitudes
use Illuminate\Http\Request;
use App\Models\Politica;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\HistorialDeModificacionesPorSolicitude;
use App\Models\ModelHasRole;
use App\Models\Nodo;
use App\Models\Prueba;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


/**
 * Class SolicitudeController
 * @package App\Http\Controllers
 */
class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       
        $usuarioAutenticado = Auth::user();
        $rolesPermitidos = ['Super Admin', 'Admin', 'Activador Nacional'];
        $rolSuperAdmin = $usuarioAutenticado->hasAnyRole($rolesPermitidos);
        $nodoUsuario = $usuarioAutenticado->id_nodo;

        if ($rolSuperAdmin) {
            $solicitudes = Solicitude::paginate();
        } else {
            $solicitudes = Solicitude::whereHas('user', function ($query) use ($nodoUsuario) {
                $query->where('id_nodo', $nodoUsuario);
            })->paginate();
        }
        
        $usuarios = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Designer', 'Admin', 'Activador Nacional']);
        })->get();

        $usuariosDesigner = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Designer']);
        })->get();


        return view('solicitude.index', compact('solicitudes', 'usuarios', 'usuariosDesigner'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitudes->perPage());
    }



     public function search(Request $request)
    {
        $parametro = $request->input('valor');
        $output= ""; // The output variable is defined and initialized

        if($parametro == 'tipo'){
            $tipoId = TiposDeSolicitude::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::where('id_tipos_de_solicitudes', $tipoId)->get();
        }
        elseif($parametro == 'evento') {
            // Hacer lo mismo para el evento especial por categoría
            $eventoId = EventosEspecialesPorCategoria::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_eventos_especiales_por_categorias', $eventoId)->get();
        }
        elseif($parametro == 'estado') {
            // Hacer lo mismo para el estado de la solicitud
            $estadoId = EstadosDeLasSolictude::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_estado_de_la_solicitud', $estadoId)->get();
        } 
        elseif($parametro == 'usuario') {
            // Hacer lo mismo para el usuario que realiza la solicitud 
            $usuarioId = User::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_usuario_que_realiza_la_solicitud', $usuarioId)->get();
        }
        elseif($parametro == 'designer') {
            // Hacer lo mismo para el usuario que se le asigna la solicitud 
            $usuarioId = User::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $idSolicitud = HistorialDeUsuariosPorSolicitude::where('id_users' , $usuarioId)->pluck('id_solicitudes')->toArray();
            $solicitudes = Solicitude::whereIn('id', $idSolicitud)->get();
        }
        elseif($parametro == 'nodo') {
            // Hacer lo mismo para el nodo 
            $nodoId = Nodo::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $idUser = User::where('id_nodo' , $nodoId)->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_usuario_que_realiza_la_solicitud', $idUser)->get();
        }


       
        // We use the loop foreach to iterate the aggregation of records
        foreach($solicitudes as $solicitude){
            $output .= 
            '<tr>
                <td>' . $solicitude->id . '</td>
                <td>' . $solicitude->tiposDeSolicitude->nombre . '</td>
                <td>' . $solicitude->fecha_y_hora_de_la_solicitud . '</td>
                <td>' . $solicitude->user->nodo->nombre . '</td>
                <td>' . $solicitude->user->name . '</td>
                <td>' . $solicitude->eventosEspecialesPorCategoria->nombre . '</td>
                <td>' . $solicitude->estadosDeLasSolictude->nombre . '</td>
                <td>
                    <a href="' . url('/solicitudes/' . $solicitude->id) . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    Detalle
                    </a>
                    <a href="' . url('/solicitudes/' . $solicitude->id . '/edit') . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                    Editar
                    </a>
                </td>
            </tr>';
        }

        return response($output); // We return the response by sending as parameter the output variable
    }


    public function pdf(){
        $solicitudes = Solicitude::all();
   
     $pdf = Pdf::loadView('solicitude.pdf', compact('solicitudes'));
        // //return $pdf->download('NumeroDeSolcitudes.pdf');

        return $pdf->stream();

    }
    

public function procesarValor()
{
    $ultimoRegistro = Prueba::latest()->first();

    // Obtener el valor del campo deseado
    $campoValor = $ultimoRegistro->numero; // Reemplaza "nombre_del_campo" con el nombre del campo que deseas obtener

    // Devolver el valor del campo en formato JSON
    return response()->json(['campoValor' => $campoValor]);
}

     

    

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitude = new Solicitude();
        $estados = EstadosDeLasSolictude::all();
        $solicitudes = TiposDeSolicitude::all();
        $especiales = EventosEspecialesPorCategoria::all();
       
        $categoriaEventos = CategoriasEventosEspeciale::all();
         // Recuperar el registro de la Politica con id_estado = 1
         $politicas = Politica::where('id_estado', 1)->first();

        return view('solicitude.create', compact('solicitude','estados' , 'solicitudes' , 'especiales', 'politicas','categoriaEventos'));
    }

    /**
     * Process the selected ID from the dropdown.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processSelectedId(Request $request)
    {
        $selectedTypeId = $request->input('tipo_solicitud_id');

        // Obtener los datos únicos por solicitud asociados al tipo de solicitud seleccionado
        $datosUnicos = DatosUnicosPorSolicitude::where('id_tipos_de_solicitudes', $selectedTypeId)->get();
    
        // Obtener los servicios por solicitud asociados al tipo de solicitud seleccionado
        $servicios = ServiciosPorTiposDeSolicitude::where('id_tipo_de_solicitud', $selectedTypeId)->get();
        $tiposDeDatos = TiposDeDato::all();
        // Devolver los datos en formato JSON
        return response()->json([
            'datos_unicos' => $datosUnicos,
            'servicios' => $servicios,
            'tipos_de_datos' => $tiposDeDatos
        ]);
    }


     /**
     * Process the selected ID from the dropdown.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eventos(Request $request)
    {
        $evento = $request->input('tipo_evento_id');
        $eventosAsociados = EventosEspecialesPorCategoria::where('id_eventos_especiales', $evento)->get();


        // Devolver los datos en formato JSON
        return response()->json([
            'evento' => $eventosAsociados
           
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();
        $currentTime = $this->getCurrentTimeInBogota();
        $idEventoEspecialPorCategoria = $request->input('id_evento_especial');
        $serviciosSeleccionados = $request->input('servicios_por_tipo');
        // Obtener la fecha y hora actual del sistema
        $estadosDefecto = EstadosDeLasSolictude::where('orden_mostrado', 1)->value('id');
    
        // Combinar los datos de la solicitud con los valores predeterminados
        $data = array_merge($request->all(), [
            'id_usuario_que_realiza_la_solicitud' => $userId,
            'id_eventos_especiales_por_categorias' => $idEventoEspecialPorCategoria,
            'id_estado_de_la_solicitud' => $estadosDefecto,
            'fecha_y_hora_de_la_solicitud' => $currentTime,
        ]);

        
    
        // Validar los datte([
        //     // Aquí coloca las reglas de validación según los campos de la solicitud
        // ]);os del formulario
        // $request->valida
    
        // Crear la solicitud con los datos combinados
        $solicitude = Solicitude::create($data);
        foreach ($serviciosSeleccionados as $servicioId) {
            // Inicializar el valor para el campo otro_servicio
            $otroServicio = null;
        
            // Verificar si el servicio seleccionado es "otro"
            if ($servicioId === 'otro') {
                $otroServicio = $request->input('otroServicioHidden');
            } else {
                // Consultar el servicio correspondiente al ID
                $servicio = ServiciosPorTiposDeSolicitude::find($servicioId);
        
                // Verificar si el servicio existe y si su nombre es "otro"
                if ($servicio && $servicio->nombre === 'otro') {
                    $otroServicio = $request->input('otroServicioHidden');
                }
            }
        
            // Crear el registro
            $elementoPorSolicitud = ElementosPorSolicitude::create([
                'id_solicitudes' => $solicitude->id,
                'id_subservicios' => $servicioId,
                'otro_servicio' => $otroServicio,
                // Otros campos que puedas necesitar
            ]);
        }
        
        
        

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'datos_unicos_por_solicitud_') !== false) {
                // Extraer el ID del subservicio del nombre del campo
                $id_subservicio = substr($key, strlen('datos_unicos_por_solicitud_'));
    
                // Crear un nuevo registro en la tabla datos_por_solicitud
                DatosPorSolicitud::create([
                    'id_solicitudes' => $solicitude->id,
                    'id_datos_unicos_por_solicitudes' => $id_subservicio,
                    'dato' => $value
                    
                ]);
            }
        }

        
        $cambioHistorial = new HistorialDeEstadosPorSolicitude();
        $cambioHistorial->id_estados_s = $estadosDefecto;
        $cambioHistorial->id_solicitudes = $solicitude->id;
        $cambioHistorial->id_users=$userId;
        $cambioHistorial->fecha_de_cambio_de_estado = Carbon::now();
        $cambioHistorial->save();
    
        
    
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud creada exitosamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitude = Solicitude::find($id);

        // Obtener todos los estados ordenados por 'orden_mostrado'
        $estados = EstadosDeLasSolictude::orderBy('orden_mostrado')->get();
    
        // Obtener el estado actual de la solicitud
        $estadoActual = $solicitude->estadosDeLasSolictude; // Cambio aquí, usando la relación estadosDeLasSolictude en lugar de estado

        // Obtener el historial de modificaciones
        $historial = HistorialDeModificacionesPorSolicitude::where('id_soli', $id)->latest()->get();

        // Realiza una consulta para obtener los elementos por solicitud
        $elementos = DB::table('elementos_por_solicitudes')
                        ->join('servicios_por_tipos_de_solicitudes', 'elementos_por_solicitudes.id_subservicios', '=', 'servicios_por_tipos_de_solicitudes.id')
                        ->select('servicios_por_tipos_de_solicitudes.nombre')
                        ->where('elementos_por_solicitudes.id_solicitudes', $id)
                        ->get();

        $datosPorSolicitud =  DB::table('datos_por_solicitud')
                                ->join('datos_unicos_por_solicitudes', 'datos_por_solicitud.id_datos_unicos_por_solicitudes', '=', 'datos_unicos_por_solicitudes.id')
                                ->select('datos_unicos_por_solicitudes.nombre as titulo', 'datos_por_solicitud.dato')
                                ->where('datos_por_solicitud.id_solicitudes', $id)
                                ->get();

        // Retorna la vista con los datos necesarios
        return view('solicitude.show', compact('solicitude', 'elementos', 'datosPorSolicitud', 'historial','estados','estadoActual'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitude = Solicitude::find($id);
        $estadosDeLaSolicitudes = EstadosDeLasSolictude::all();

        // Realiza una consulta para obtener los elementos por solicitud
        $elementos = DB::table('elementos_por_solicitudes')
                        ->join('servicios_por_tipos_de_solicitudes', 'elementos_por_solicitudes.id_subservicios', '=', 'servicios_por_tipos_de_solicitudes.id')
                        ->select('servicios_por_tipos_de_solicitudes.nombre')
                        ->where('elementos_por_solicitudes.id_solicitudes', $id)
                        ->get();

        $datosPorSolicitud =  DB::table('datos_por_solicitud')
                                ->join('datos_unicos_por_solicitudes', 'datos_por_solicitud.id_datos_unicos_por_solicitudes', '=', 'datos_unicos_por_solicitudes.id')
                                ->select('datos_unicos_por_solicitudes.nombre as titulo', 'datos_por_solicitud.dato')
                                ->where('datos_por_solicitud.id_solicitudes', $id)
                                ->get();

        return view('solicitude.edit', compact('solicitude', 'elementos', 'datosPorSolicitud','estadosDeLaSolicitudes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitude $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
         // Validar los datos de entrada para la modificación
         $request->validate([
            'modificacion' => 'required',
        ]);

        // Crear una nueva instancia de HistorialDeModificacionesPorSolicitude
        $modificacion = new HistorialDeModificacionesPorSolicitude();
        $modificacion->id_soli = $solicitude->id; // Asignar el ID de la solicitud
        $modificacion->modificacion = $request->input('modificacion');
        $modificacion->fecha_de_modificacion = Carbon::now(); // Establecer la fecha actual

        // Guardar la nueva modificación en el historial
        $modificacion->save();

        return redirect()->route('solicitudes.index')
            ->with('success', 'Modificación Registrada Exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitude $solicitude
     * @return \Illuminate\Http\Response
     */
    public function Actualizar_estado(Request $request, Solicitude $solicitude)
    {
        $solicitude->id_estado_de_la_solicitud = $request->input('id_estado_de_la_solicitud');
        $solicitude->save();
        $userId = Auth::id();
        $cambioHistorial = new HistorialDeEstadosPorSolicitude();
        $cambioHistorial->id_estados_s = $request->input('id_estado_de_la_solicitud');
        $cambioHistorial->id_solicitudes = $solicitude->id;
        $cambioHistorial->id_users=$userId;
        $cambioHistorial->fecha_de_cambio_de_estado = Carbon::now();
        $cambioHistorial->save();

        return redirect()->route('solicitudes.index')
            ->with('success', 'Estado Actualizado Exitosamente');
    }

    

    public function duplicarFormulario($id)
    {
        // Obtener la solicitud por su ID
        $solicitud = Solicitude::findOrFail($id);
        $estados = EstadosDeLasSolictude::all();
        $solicitudes = TiposDeSolicitude::all();
        $especiales = EventosEspecialesPorCategoria::all();
        $currentTime = $this->getCurrentTimeInBogota();
        $categoriaEventos = CategoriasEventosEspeciale::all();
         // Recuperar el registro de la Politica con id_estado = 1
         $politicas = Politica::where('id_estado', 1)->first();

        // Obtener ids relacionadas con la solicitud a duplicar
        $tipo_solicitud_id = $solicitud->id_tipos_de_solicitudes;
        $id_evento_especial = $solicitud->id_eventos_especiales_por_categorias;

        $evento_especial = EventosEspecialesPorCategoria::findOrFail($id_evento_especial);

        // Obtener la categoría de eventos especiales asociada al evento especial
        $id_categoria_evento = $evento_especial->id_eventos_especiales;

        // Obtener los IDs de los subservicios asociados a esta solicitud
        $idSubservicios = ElementosPorSolicitude::where('id_solicitudes', $id)
        ->pluck('id_subservicios')
        ->toArray();

        // Obtener los elementos con información adicional "otro_servicio"
        $elementoConOtroServicio = ElementosPorSolicitude::where('id_solicitudes', $id)
        ->whereNotNull('otro_servicio')
        ->value('otro_servicio');

        $datosPorSolicitud = DatosPorSolicitud::where('id_solicitudes', $id)
        ->pluck('dato', 'id_datos_unicos_por_solicitudes');


        // Redirigir a la vista 'solicitudes.create' y pasar el idTipoSolicitud como parámetro
        return view('solicitude.create', compact(
            'tipo_solicitud_id',
            'id_categoria_evento',
            'id_evento_especial',
            'estados',
            'solicitudes',
            'especiales',
            'politicas',
            'currentTime',
            'categoriaEventos',
            'idSubservicios',
            'datosPorSolicitud',
            'elementoConOtroServicio' 
        ));    }

   

    /**
 * Obtiene la hora actual en la zona horaria de Bogotá.
 *
 * @return array|null
 */
public function getCurrentTimeInBogota()
{
    $response = Http::get('https://timeapi.io/api/Time/current/zone?timeZone=America/Bogota', [
        'timeZone' => 'America/Bogota',
    ]);

    if ($response->successful()) {
        $dateTime = $response['dateTime'];
        $dateTimeParts = explode('T', $dateTime); // Separar la fecha y la hora

        // Formatear la fecha y la hora en el formato de MySQL (YYYY-MM-DD HH:MM:SS)
        $formattedDateTime = $dateTimeParts[0] . ' ' . substr($dateTimeParts[1], 0, 8);

        return $formattedDateTime;
    } else {
        return null;
    }
}


    /**
 * Obtiene la hora actual en la zona horaria de Bogotá.
 *
 * @return array|null
 */

   /**
     * Asigna una solicitud a un diseñador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    
    public function asignarSolicitud(Request $request)
    {
        // Validar los datos recibidos en la solicitud si es necesario
         $request->validate([
            'solicitud_id' => 'required|exists:solicitudes,id',
            'usuario_id' => 'required|exists:users,id',
         ]);
    
        // Acceder a los datos del formulario
        $solicitudId = $request->input('solicitud_id');
        $designerId = $request->input('usuario_id');
    
        // Crear un nuevo registro en el historial de asignaciones
        $historial = new HistorialDeUsuariosPorSolicitude();
        $historial->id_solicitudes = $solicitudId;
        $historial->id_users = $designerId;
        $historial->fecha_asignación = now();
        $historial->id_estados = 1; // Asignar el estado correspondiente
        $historial->save();
    
        // Redireccionar o devolver una respuesta JSON según sea necesario
        return redirect()->back()->with('success', 'Solicitud Asignada Correctamente al Diseñador.');
    }
    

    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $solicitude = Solicitude::find($id)->delete();

    //     return redirect()->route('solicitudes.index')
    //         ->with('success', 'Solicitude deleted successfully');
    // }
}
