<?php

namespace App\Http\Controllers;

use App\Models\CategoriasEventosEspeciale;
use App\Models\DatosPorSolicitud;
use App\Models\DatosUnicosPorSolicitude;
use App\Models\ElementosPorSolicitude;
use App\Models\Estado;
use App\Models\EstadosDeLasSolictude;
use App\Models\EventosEspecialesPorCategoria;
use App\Models\Solicitude;
use App\Models\TiposDeDato;
use App\Models\TiposDeSolicitude;
use App\Models\ServiciosPorTiposDeSolicitude; // Añade la importación de la clase ServiciosPorTiposDeSolicitudes
use Illuminate\Http\Request;
use App\Models\Politica;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\HistorialDeModificacionesPorSolicitude;


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
        $solicitudes = Solicitude::paginate();
        //$currentTime = $this->getCurrentTimeInBogota();
        $fechasFestivas = $this->mostrarFechasFestivas();
        $finesSemanas = $this->obtenerFinesDeSemana(); 
        $disabledDates = array_merge($fechasFestivas, $finesSemanas);

        return view('solicitude.index', compact('solicitudes' , 'disabledDates'))
             ->with('i', (request()->input('page', 1) - 1) * $solicitudes->perPage());
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
        $currentTime = $this->getCurrentTimeInBogota();
        $fechasFestivas = $this->mostrarFechasFestivas();
        $finesSemanas = $this->obtenerFinesDeSemana(); 
        $disabledDates = array_merge($fechasFestivas, $finesSemanas);
        $categoriaEventos = CategoriasEventosEspeciale::all();
         // Recuperar el registro de la Politica con id_estado = 1
         $politicas = Politica::where('id_estado', 1)->first();

        return view('solicitude.create', compact('solicitude','estados' , 'solicitudes' , 'especiales', 'politicas','currentTime', 'disabledDates', 'categoriaEventos'));
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
        
    
        // Combinar los datos de la solicitud con los valores predeterminados
        $data = array_merge($request->all(), [
            'id_usuario_que_realiza_la_solicitud' => $userId,
            'id_eventos_especiales_por_categorias' => $idEventoEspecialPorCategoria,
            'id_estado_de_la_solicitud' => 1,
            'fecha_y_hora_de_la_solicitud' => $currentTime,
        ]);
    
        // Validar los datte([
        //     // Aquí coloca las reglas de validación según los campos de la solicitud
        // ]);os del formulario
        // $request->valida
    
        // Crear la solicitud con los datos combinados
        $solicitude = Solicitude::create($data);

        foreach ($serviciosSeleccionados as $servicioId) {
            // Crear un registro en la tabla elementos_por_solicitud
            $elementoPorSolicitud = ElementosPorSolicitude::create([
                'id_solicitudes' => $solicitude->id,
                'id_subservicios' => $servicioId,
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
        return view('solicitude.show', compact('solicitude', 'elementos', 'datosPorSolicitud', 'historial'));

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
        //  $request->validate([
        //     'modificacion' => 'required',
        //     'id_estado_de_la_solicitud' => 'required|exists:estados_de_la_solicitud,id',
        // ]);

        $solicitude->id_estado_de_la_solicitud = $request->input('id_estado_de_la_solicitud');
        $solicitude->save();

        // Crear una nueva instancia de HistorialDeModificacionesPorSolicitude
        $modificacion = new HistorialDeModificacionesPorSolicitude();
        $modificacion->id_soli = $solicitude->id; // Asignar el ID de la solicitud
        $modificacion->modificacion = $request->input('modificacion');
        //$modificacion->id_estado_de_la_solicitud = $request->input('id_estado_de_la_solicitud'); // Recibir el ID del estado de la solicitud
        $modificacion->fecha_de_modificacion = Carbon::now(); // Establecer la fecha actual

        // Guardar la nueva modificación en el historial
        $modificacion->save();

        return redirect()->route('solicitudes.index')
            ->with('success', 'Modificación registrada exitosamente');
    }

    // /**
    //  * Obtiene la hora actual en la zona horaria de Bogotá.
    //  *
    //  * @return string|null
    //  */
    // public function getCurrentTimeInBogota()
    // {
    //     $response = Http::get('https://timeapi.io/api/Time/current/zone?timeZone=America/Bogota');

    //     if ($response->successful()) {
    //         return $response['dateTime'];
    //     } else {
    //         return null;
    //     }
    // }

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

public function mostrarFechasFestivas()
{
    // Lista de días festivos
    $dias_festivos = [
        '2024-01-01',
        '2024-03-25',
        '2024-03-28' ,
        '2024-03-29' ,
        '2024-05-01',
        '2024-05-13',
        '2024-06-03',
        '2024-06-10',
        '2024-07-01' ,
        '2024-07-20' ,
        '2024-08-07' ,
        '2024-10-12',
        '2024-11-04' ,
        '2024-11-11',
        '2024-12-08',
        '2024-12-25'
    ];

    // Pasar los datos a la vista
    return $dias_festivos;
}


public function obtenerFinesDeSemana()
{
    $year = 2024; // Año para el que se desea obtener los fines de semana
    $weekends = [];

    // Iterar sobre todos los días del año
    for ($month = 1; $month <= 12; $month++) {
        for ($day = 1; $day <= Carbon::createFromDate($year, $month, 1)->daysInMonth; $day++) {
            $date = Carbon::createFromDate($year, $month, $day);
            
            // Verificar si el día es fin de semana
            if ($date->isWeekend()) {
                $weekends[] = $date->toDateString(); // Agregar el día a la lista de fines de semana
            }
        }
    }

    return $weekends;
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
