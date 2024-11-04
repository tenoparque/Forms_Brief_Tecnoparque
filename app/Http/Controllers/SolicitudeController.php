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
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;


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
            $solicitudes = Solicitude::paginate(10);
        } else {
            if ($usuarioAutenticado->hasRole('Designer')) {
                $solicitudes = Solicitude::whereHas('historial', function ($query) use ($usuarioAutenticado, $nodoUsuario) {
                    $query->where('id_users', $usuarioAutenticado->id)
                        ->where('id_estados', 1) // Filtrar por el estado si es necesario
                        ->whereHas('user', function ($query) use ($nodoUsuario) {
                            $query->where('id_nodo', $nodoUsuario); // Filtrar por el nodo del Designer
                        });
                })->paginate(10);
            } else {
                $solicitudes = Solicitude::whereHas('user', function ($query) use ($nodoUsuario) {
                    $query->where('id_nodo', $nodoUsuario);
                })->paginate();
            }
        }


        $usuarios = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Designer', 'Admin', 'Activador Nacional']);
        })->get();

        $usuariosDesigner = User::whereHas('roles', function ($query) {
            $query->where('name', 'Designer'); // Filtrar solo por rol de "Designer"
        })
            ->where('id_nodo', $nodoUsuario) // Filtrar por nodo del usuario autenticado
            ->get();

        return view('solicitude.index', compact('solicitudes', 'usuarios', 'usuariosDesigner'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitudes->perPage());
    }

    public function reports()
    {
        $tiposSolicitudes = TiposDeSolicitude::all();

        $nodos = Nodo::all();
        $estados = EstadosDeLasSolictude::all();
        $eventosSolicitud = EventosEspecialesPorCategoria::all();

        return view('reportes-estadisticas.reports', compact('tiposSolicitudes', 'nodos', 'estados', 'eventosSolicitud'));
    }



    public function search(Request $request)
    {
        $parametro = $request->input('valor');
        $output = ""; // The output variable is defined and initialized

        if ($parametro == 'tipo') {
            $tipoId = TiposDeSolicitude::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::where('id_tipos_de_solicitudes', $tipoId)->get();
        } elseif ($parametro == 'evento') {
            // Hacer lo mismo para el evento especial por categoría
            $eventoId = EventosEspecialesPorCategoria::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_eventos_especiales_por_categorias', $eventoId)->get();
        } elseif ($parametro == 'estado') {
            // Hacer lo mismo para el estado de la solicitud
            $estadoId = EstadosDeLasSolictude::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_estado_de_la_solicitud', $estadoId)->get();
        } elseif ($parametro == 'usuario') {
            // Hacer lo mismo para el usuario que realiza la solicitud 
            $usuarioId = User::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_usuario_que_realiza_la_solicitud', $usuarioId)->get();
        } elseif ($parametro == 'designer') {
            // Hacer lo mismo para el usuario que se le asigna la solicitud 
            $usuarioId = User::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $idSolicitud = HistorialDeUsuariosPorSolicitude::where('id_users', $usuarioId)->pluck('id_solicitudes')->toArray();
            $solicitudes = Solicitude::whereIn('id', $idSolicitud)->get();
        } elseif ($parametro == 'nodo') {
            // Hacer lo mismo para el nodo 
            $nodoId = Nodo::where('nombre', 'LIKE', '%' . $request->search . '%')->pluck('id')->toArray();
            $idUser = User::where('id_nodo', $nodoId)->pluck('id')->toArray();
            $solicitudes = Solicitude::whereIn('id_usuario_que_realiza_la_solicitud', $idUser)->get();
        }



        // We use the loop foreach to iterate the aggregation of records
        foreach ($solicitudes as $solicitude) {
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



    public function pdf(Request $request)
    {
        // dd($request->all());
        $cuartoComboValue = $request->input('cuartoComboValue');
        $tipo = $request->input('nombre');
        // dd($tipo);
        if ($tipo == 'Estados De Las Solictudes') {
            $solicitudes = Solicitude::where('id_estado_de_la_solicitud', $cuartoComboValue)->get();
        } elseif ($tipo == 'Eventos Especiales Por Categoria') {
            $solicitudes = Solicitude::where('id_eventos_especiales_por_categorias', $cuartoComboValue)->get();
        } elseif ($tipo == 'Nodo') {
            $solicitudes = Solicitude::whereHas('user', function ($query) use ($cuartoComboValue) {
                $query->whereHas('nodo', function ($nestedQuery) use ($cuartoComboValue) {
                    $nestedQuery->where('id', $cuartoComboValue);
                });
            })->get();
        } elseif ($tipo == 'Tipos De Solicitudes') {
            $solicitudes = Solicitude::where('id_tipos_de_solicitudes', $cuartoComboValue)->get();
        } elseif ($tipo == 'Todo') {
            $solicitudes = Solicitude::all();
        }

        // dd($solicitudes);
        $pdf = Pdf::loadView('solicitude.pdf', compact('solicitudes'));
        return $pdf->stream();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarioAutenticado = Auth::user();
        $solicitude = new Solicitude();
        $estados = EstadosDeLasSolictude::all();
        $solicitudes = TiposDeSolicitude::where('id_estado', 1)->get();
        $especiales = EventosEspecialesPorCategoria::all();
        $nodos = Nodo::where('id_estado', 1)->get();
        //dd($solicitudes);
        $categoriaEventos = CategoriasEventosEspeciale::all();
        // Recuperar el registro de la Politica con id_estado = 1
        $politicas = Politica::where('id_estado', 1)->first();

        return view('solicitude.create', compact('solicitude', 'estados', 'solicitudes', 'especiales', 'politicas', 'categoriaEventos', 'nodos'));
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
        $user = Auth::user();
        $userId = $user->id;
       

        $currentTime = Carbon::now('America/Bogota');
        $idEventoEspecialPorCategoria = $request->input('id_evento_especial');
        $serviciosSeleccionados = $request->input('servicios_por_tipo');
        // Obtener la fecha y hora actual del sistema
        $estadosDefecto = EstadosDeLasSolictude::where('orden_mostrado', 1)->value('id');

        // Si el usuario es Super Admin, selecciona el nodo que quiere asignar
        if ($user->hasRole('Super Admin')) {
            $nodoId = $request->input('id_nodo'); // Nodo seleccionado por el Super Admin
        
            // Encuentra un usuario que pertenezca al nodo y tenga un rol específico
            $usuarioDelNodo = User::where('id_nodo', $nodoId)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Experto Divulgación'); 
                })
                ->first();
        
            // Verifica si se encontró un usuario con el rol en el nodo
            if ($usuarioDelNodo) {
                $userId = $usuarioDelNodo->id; // Asigna la solicitud al usuario encontrado
            } else {
                // Maneja el caso en el que no se encuentra ningún usuario con el rol en el nodo
                Log::warning("No se encontró un usuario con el rol 'Dinamizador' en el nodo ID: {$nodoId}");
                return redirect()->back()->with('error', 'No se encontró un usuario con el rol especificado en el nodo seleccionado.');
            }
        }
        // Combinar los datos de la solicitud con los valores predeterminados
        $data = array_merge($request->all(), [
            'id_usuario_que_realiza_la_solicitud' => $userId,
            'id_eventos_especiales_por_categorias' => $idEventoEspecialPorCategoria,
            'id_estado_de_la_solicitud' => $estadosDefecto,
            'fecha_y_hora_de_la_solicitud' => $currentTime,
        ]);
      
        
        // Crear la solicitud con los datos combinados
        $solicitude = Solicitude::create($data);
        Log::info("Solicitud creada con ID: {$solicitude->id}");
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
        $cambioHistorial->id_users = $userId;
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
        return view('solicitude.show', compact('solicitude', 'elementos', 'datosPorSolicitud', 'historial', 'estados', 'estadoActual'));
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

        return view('solicitude.edit', compact('solicitude', 'elementos', 'datosPorSolicitud', 'estadosDeLaSolicitudes'));
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
         // Verificar si el usuario tiene los roles permitidos
    $user = Auth::user();
    if (!$user->hasAnyRole(['Super Admin','Designer', 'Experto Divulgación'])) {
        return redirect()->route('solicitudes.index')
            ->with('error', 'No tienes permiso para actualizar el estado de la solicitud.');
    }

        $solicitude->id_estado_de_la_solicitud = $request->input('id_estado_de_la_solicitud');
        $solicitude->save();
        $userId = Auth::id();
        $cambioHistorial = new HistorialDeEstadosPorSolicitude();
        $cambioHistorial->id_estados_s = $request->input('id_estado_de_la_solicitud');
        $cambioHistorial->id_solicitudes = $solicitude->id;
        $cambioHistorial->id_users = $userId;
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
        $currentTime = Carbon::now('America/Bogota');
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
        ));
    }



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
     
         $solicitudId = $request->input('solicitud_id');
         $designerId = $request->input('usuario_id');
     
         // Buscar y desactivar todos los registros activos con la misma id_solicitud
         HistorialDeUsuariosPorSolicitude::where('id_solicitudes', $solicitudId)
             ->where('id_estados', 1) // '1' puede representar el estado activo, asegúrate de ajustarlo según tu esquema
             ->update(['id_estados' => 2]);
     
         // Crear un nuevo registro en el historial de asignaciones con el nuevo estado activo
         $historial = new HistorialDeUsuariosPorSolicitude();
         $historial->id_solicitudes = $solicitudId;
         $historial->id_users = $designerId;
         $historial->fecha_asignación = now();
         $historial->id_estados = 1; // Asignar el estado activo
         $historial->save();
     
         // Actualizar el estado de la solicitud a "ASIGNADO"
         $solicitud = Solicitude::findOrFail($solicitudId);
         $estadoAsignadoId = EstadosDeLasSolictude::where('nombre', 'ASIGNADO')->value('id'); // Asegúrate de que el estado "ASIGNADO" existe en la tabla de estados
         $solicitud->id_estado_de_la_solicitud = $estadoAsignadoId;
         $solicitud->save();
     
         return redirect()->back()->with('success', 'Solicitud Asignada Correctamente al Diseñador y estado actualizado a ASIGNADO.');
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

    public function solicitudefinalizadas()
    {
        $usuarioAutenticado = Auth::user();
        $rolesPermitidos = ['Super Admin', 'Admin', 'Activador Nacional'];
        $rolSuperAdmin = $usuarioAutenticado->hasAnyRole($rolesPermitidos);

        // Lógica para obtener el conteo de solicitudes finalizadas
        if ($rolSuperAdmin) {
            $count = Solicitude::where('id_estado_de_la_solicitud', 5)->count();
        } else {
            if ($usuarioAutenticado->hasRole('Designer')) {
                $count = Solicitude::whereHas('historial', function ($query) use ($usuarioAutenticado) {
                    $query->where('id_users', $usuarioAutenticado->id)
                        ->where('id_estados', 1);
                })->where('id_estado_de_la_solicitud', 5)->count();
            } else {
                $nodoUsuario = $usuarioAutenticado->id_nodo;
                $count = Solicitude::whereHas('user', function ($query) use ($nodoUsuario) {
                    $query->where('id_nodo', $nodoUsuario);
                })->where('id_estado_de_la_solicitud', 5)->count();
            }
        }

        return response($count);
    }
}
