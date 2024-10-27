<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeModificacionesPorSolicitude;
use Illuminate\Http\Request;
use App\Models\Solicitude;
use App\Models\Nodo;
use App\Models\User;
use App\Models\HistorialDeUsuariosPorSolicitude;
use App\Models\EstadosDeLasSolictude;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function datosGraficas()
    {

        $usuarioAutenticado = Auth::user();
        $rolesPermitidos = ['Super Admin', 'Admin', 'Activador Nacional'];
        $rolesDesigner = ['Designer'];
        $rolesDinamizador = ['Dinamizador'];
        $rolSuperAdmin = $usuarioAutenticado->hasAnyRole($rolesPermitidos);
        $esDesigner = $usuarioAutenticado->hasAnyRole($rolesDesigner);
        $esDinamizador = $usuarioAutenticado->hasAnyRole($rolesDinamizador);
        $nodoUsuario = $usuarioAutenticado->id_nodo;
        $tiposDeSolicitudes = [];

        // Inicializar las variables que podrían no ser asignadas
        $datosMesAMes = [];
        $tiposDeSolicitudes = [];
        $CardDos = 0;
        $datosPorNodo = [];
        $etiquetas = [];
        $cantidades_asignadas = [];

        if ($rolSuperAdmin) {
            // Obtener el número total de solicitudes   
            $propias = Solicitude::count();
            $totalModificacionesGeneral = HistorialDeModificacionesPorSolicitude::count();
            $total = $propias + $totalModificacionesGeneral;

            $ordenUno = EstadosDeLasSolictude::where('orden_mostrado', 1)
                ->where('id_estado', 1)
                ->value('id');

            $CardDos = Solicitude::where('id_estado_de_la_solicitud', $ordenUno)->count();


            $tiposDeSolicitudes = Solicitude::join('tipos_de_solicitudes', 'solicitudes.id_tipos_de_solicitudes', '=', 'tipos_de_solicitudes.id')
                ->select('tipos_de_solicitudes.nombre', DB::raw('COUNT(*) as total'))
                ->groupBy('tipos_de_solicitudes.nombre')
                ->orderBy('total', 'desc')
                ->limit(5)
                ->get();

            // Obtener datos de solicitudes por mes
            $solicitudes = Solicitude::select(DB::raw('COUNT(*) as total_solicitudes, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            // Obtener datos de modificaciones por mes
            $modificaciones = HistorialDeModificacionesPorSolicitude::select(DB::raw('COUNT(*) as total_modificaciones, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            foreach ($solicitudes as $solicitud) {
                $mes = $solicitud->mes;
                $anio = $solicitud->anio;
                $totalSolicitudes = $solicitud->total_solicitudes;

                // Buscar las modificaciones correspondientes a este mes y año
                $modificacion = $modificaciones->where('mes', $mes)->where('anio', $anio)->first();
                $totalModificaciones = $modificacion ? $modificacion->total_modificaciones : 0;

                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes,
                    'total_modificaciones' => $totalModificaciones
                ];
            }

            $data = DB::table('solicitudes')
                ->join('users', 'solicitudes.id_usuario_que_realiza_la_solicitud', '=', 'users.id')
                ->join('nodos', 'users.id_nodo', '=', 'nodos.id')
                ->select('nodos.nombre', DB::raw('COUNT(*) as total_solicitudes'))
                ->groupBy('nodos.nombre')
                ->orderBy('nodos.nombre')
                ->get();

            // Obtener los datos de modificaciones por nodo
            $modificacionesNodo = DB::table('historial_de_modificaciones_por_solicitudes')
                ->join('solicitudes', 'historial_de_modificaciones_por_solicitudes.id_soli', '=', 'solicitudes.id')
                ->join('users', 'solicitudes.id_usuario_que_realiza_la_solicitud', '=', 'users.id')
                ->join('nodos', 'users.id_nodo', '=', 'nodos.id')
                ->select('nodos.nombre', DB::raw('COUNT(*) as total_modificaciones'))
                ->groupBy('nodos.nombre')
                ->orderBy('nodos.nombre')
                ->get();

            // Combinar los datos de solicitudes y modificaciones por nodo
            // Combinar los datos de solicitudes y modificaciones por nodo
            $datosPorNodo = [];
            foreach ($data as $solicitud) {
                $nombreNodo = $solicitud->nombre;
                $totalSolicitudes = $solicitud->total_solicitudes;

                // Buscar las modificaciones correspondientes a este nodo
                $modificacion = $modificacionesNodo->firstWhere('nombre', $nombreNodo);
                $totalModificaciones = $modificacion ? $modificacion->total_modificaciones : 0;

                // Agregar los datos al array
                $datosPorNodo[] = [
                    'nombre' => $nombreNodo,
                    'total_solicitudes' => $totalSolicitudes,
                    'total_modificaciones' => $totalModificaciones
                ];
            }


            //Consultas para asignadas

            // Obtener todos los usuarios con rol DESIGNER
            $usuariosDesigners = User::role('DESIGNER')->pluck('id');

            // Consultar el número de historiales con id_estados = 1 para cada usuario
            $historiales = DB::table('historial_de_usuarios_por_solicitudes')
                ->whereIn('id_users', $usuariosDesigners)
                ->where('id_estados', 1)
                ->select('id_users', DB::raw('COUNT(*) as cantidad'))
                ->groupBy('id_users')
                ->get();

            // Construir un array asociativo con la cantidad de historiales para cada usuario
            $datosGraficaAsignadas = [];
            foreach ($usuariosDesigners as $usuarioId) {
                $cantidadHistoriales = $historiales->where('id_users', $usuarioId)->first();
                if ($cantidadHistoriales) {
                    $datosGraficaAsignadas[] = ['usuario' => $usuarioId, 'cantidad' => $cantidadHistoriales->cantidad];
                } else {
                    $datosGraficaAsignadas[] = ['usuario' => $usuarioId, 'cantidad' => 0];
                }
            }

            // Obtener los nombres de los usuarios
            $nombresUsuarios = User::whereIn('id', $usuariosDesigners)->pluck('name', 'id');

            // Combinar los datos de la gráfica con los nombres de los usuarios
            foreach ($datosGraficaAsignadas as &$dato) {
                $dato['nombre'] = $nombresUsuarios[$dato['usuario']];
            }

            // Ordenar los datos por nombre de usuario
            usort($datosGraficaAsignadas, function ($a, $b) {
                return strcmp($a['nombre'], $b['nombre']);
            });

            // Obtener los nombres de los usuarios para etiquetas de la gráfica
            $etiquetas = array_column($datosGraficaAsignadas, 'nombre');

            // Obtener las cantidades de historiales para los datos de la gráfica
            $cantidades_asignadas = array_column($datosGraficaAsignadas, 'cantidad');



            return response()->json(['solicitudes' => $propias, 'modificaciones' => $totalModificacionesGeneral, 'total' => $total, 'tiposDeSolicitudes' => $tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes, 'datosPorNodo' => $datosPorNodo, 'etiquetas' => $etiquetas, 'cantidades_asignadas' => $cantidades_asignadas,  'CardDos' => $CardDos]);
        } elseif ($esDesigner) {

            $idsSolicitudes = HistorialDeUsuariosPorSolicitude::where('id_users', $usuarioAutenticado->id)
                ->pluck('id_solicitudes');

            $propias = $idsSolicitudes->count();

            $totalModificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', $idsSolicitudes)->count();

            $total = $propias + $totalModificaciones;

            $tiposDeSolicitudes = DB::table('solicitudes')
                ->join('tipos_de_solicitudes', 'solicitudes.id_tipos_de_solicitudes', '=', 'tipos_de_solicitudes.id')
                ->whereIn('solicitudes.id', $idsSolicitudes)
                ->select('tipos_de_solicitudes.nombre', DB::raw('COUNT(*) as total'))
                ->groupBy('tipos_de_solicitudes.nombre')
                ->orderByDesc('total')
                ->get();



            $solicitudes = Solicitude::whereIn('id', $idsSolicitudes)
                ->select(DB::raw('COUNT(*) as total_solicitudes, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            // Obtener datos de modificaciones por mes
            $modificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', $idsSolicitudes)
                ->select(DB::raw('COUNT(*) as total_modificaciones, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            // Combinar los datos de solicitudes y modificaciones por mes
            $datosMesAMes = [];

            foreach ($solicitudes as $solicitud) {
                $mes = $solicitud->mes;
                $anio = $solicitud->anio;
                $totalSolicitudes = $solicitud->total_solicitudes;

                // Buscar las modificaciones correspondientes a este mes y año
                $modificacion = $modificaciones->where('mes', $mes)->where('anio', $anio)->first();
                $totalModificaciones = $modificacion ? $modificacion->total_modificaciones : 0;

                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes,
                    'total_modificaciones' => $totalModificaciones
                ];
            }

            return response()->json(['solicitudes' => $propias, 'modificaciones' => $totalModificaciones, 'total' => $total, 'tiposDeSolicitudes' => $tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes]);
        } elseif ($esDinamizador) {
            // Obtener el ID del nodo del usuario autenticado
            $idNodoUsuario = $usuarioAutenticado->id_nodo;

            // Obtener todas las IDs de solicitudes realizadas por usuarios del mismo nodo
            $idsSolicitudes = Solicitude::whereHas('user', function ($query) use ($idNodoUsuario) {
                $query->where('id_nodo', $idNodoUsuario);
            })->pluck('id')->toArray();

            // Contar el número de solicitudes
            $propias = count($idsSolicitudes);

            // Contar el número de modificaciones para las solicitudes encontradas
            $totalModificacionesGeneral = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', $idsSolicitudes)->count();

            $total = $propias + $totalModificacionesGeneral;

            $tiposDeSolicitudes = DB::table('solicitudes')
                ->join('tipos_de_solicitudes', 'solicitudes.id_tipos_de_solicitudes', '=', 'tipos_de_solicitudes.id')
                ->whereIn('solicitudes.id', $idsSolicitudes)
                ->select('tipos_de_solicitudes.nombre', DB::raw('COUNT(*) as total'))
                ->groupBy('tipos_de_solicitudes.nombre')
                ->orderByDesc('total')
                ->get();

            $solicitudes = Solicitude::whereIn('id', $idsSolicitudes)
                ->select(DB::raw('COUNT(*) as total_solicitudes, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            // Obtener datos de modificaciones por mes
            $modificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', $idsSolicitudes)
                ->select(DB::raw('COUNT(*) as total_modificaciones, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            // Combinar los datos de solicitudes y modificaciones por mes
            $datosMesAMes = [];

            foreach ($solicitudes as $solicitud) {
                $mes = $solicitud->mes;
                $anio = $solicitud->anio;
                $totalSolicitudes = $solicitud->total_solicitudes;


                // Buscar las modificaciones correspondientes a este mes y año
                $modificacion = $modificaciones->where('mes', $mes)->where('anio', $anio)->first();
                $totalModificaciones = $modificacion ? $modificacion->total_modificaciones : 0;

                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes,
                    'total_modificaciones' => $totalModificaciones
                ];
            }

            return response()->json(['solicitudes' => $propias, 'modificaciones' => $totalModificacionesGeneral, 'total' => $total, 'tiposDeSolicitudes' => $tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes]);
        } else {
            $propias = Solicitude::where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id)->count();

            $totalModificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', function ($query) use ($usuarioAutenticado) {
                $query->select('id')
                    ->from('solicitudes')
                    ->where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id);
            })->count();
            $total = $propias + $totalModificaciones;

            $tiposDeSolicitudes = Solicitude::where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id)
                ->join('tipos_de_solicitudes', 'solicitudes.id_tipos_de_solicitudes', '=', 'tipos_de_solicitudes.id')
                ->select('tipos_de_solicitudes.nombre', DB::raw('COUNT(*) as total'))
                ->groupBy('tipos_de_solicitudes.nombre')
                ->orderBy('total', 'desc')
                ->get();

            $solicitudes = Solicitude::where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id)
                ->select(DB::raw('COUNT(*) as total_solicitudes, YEAR(created_at) as anio, MONTH(created_at) as mes'))
                ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
                ->get();

            foreach ($solicitudes as $solicitud) {
                $mes = $solicitud->mes;
                $anio = $solicitud->anio;
                $totalSolicitudes = $solicitud->total_solicitudes;

                // Obtener las modificaciones correspondientes a este mes y año
                $totalModificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', function ($query) use ($usuarioAutenticado, $mes, $anio) {
                    $query->select('id')
                        ->from('solicitudes')
                        ->where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id)
                        ->whereYear('created_at', $anio)
                        ->whereMonth('created_at', $mes);
                })->count();

                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes,
                    'total_modificaciones' => $totalModificaciones
                ];
            }

            return response()->json(['solicitudes' => $propias, 'modificaciones' => $totalModificaciones, 'total' => $total, 'tiposDeSolicitudes' => $tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes]);
        }
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario si es necesario
        // Recuerda encriptar la contraseña
        // dd($request->input('txtPassw'));
        // Obtener el usuario actualmente autenticado
        $user = auth()->user();

        // Actualizar la información del usuario con los datos del formulario
        $user->name = $request->input('name');
        $user->apellidos = $request->input('apellidos');
        $user->email = $request->input('email');
        $user->celular = $request->input('celular');

        // Si se ha marcado la casilla para actualizar la contraseña
        if ($request->filled('txtPassw')) {
            // Encriptar la nueva contraseña y actualizarla
            $user->password = Hash::make($request->input('txtPassw'));
        }

        // Aquí usamos dd() para verificar los datos antes de guardarlos en la base de datos
        // dd($user);

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir a la página de perfil u otra página según sea necesario
        return redirect()->route('home.index')
            ->with('success', 'Usuario Actualizado Exitosamente');
    }
}
