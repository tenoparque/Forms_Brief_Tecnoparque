<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeModificacionesPorSolicitude;
use Illuminate\Http\Request;
use App\Models\Solicitude;
use App\Models\Nodo;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;


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
        $rolSuperAdmin = $usuarioAutenticado->hasAnyRole($rolesPermitidos);
        $nodoUsuario = $usuarioAutenticado->id_nodo;
        $tiposDeSolicitudes = [];
        
        if ($rolSuperAdmin) {
            $propias = Solicitude::count();
            $totalModificaciones = HistorialDeModificacionesPorSolicitude::count();
            $total = $propias + $totalModificaciones;

            $tiposDeSolicitudes = Solicitude::join('tipos_de_solicitudes', 'solicitudes.id_tipos_de_solicitudes', '=', 'tipos_de_solicitudes.id')
            ->select('tipos_de_solicitudes.nombre', DB::raw('COUNT(*) as total'))
            ->groupBy('tipos_de_solicitudes.nombre')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

            $solicitudes = Solicitude::select(DB::raw('COUNT(*) as total_solicitudes, YEAR(created_at) as anio, MONTH(created_at) as mes'))
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();

            foreach ($solicitudes as $solicitud) {
                $mes = $solicitud->mes;
                $anio = $solicitud->anio;
                $totalSolicitudes = $solicitud->total_solicitudes;
        
                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes
                ];
            }

            $data = DB::table('solicitudes')
            ->join('users', 'solicitudes.id_usuario_que_realiza_la_solicitud', '=', 'users.id')
            ->join('nodos', 'users.id_nodo', '=', 'nodos.id')
            ->select('nodos.nombre', DB::raw('COUNT(*) as total_solicitudes'))
            ->groupBy('nodos.nombre')
            ->orderBy('nodos.nombre')
            ->get();


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
            


            return response()->json(['solicitudes' => $propias, 'modificaciones'=> $totalModificaciones, 'total'=>$total, 'tiposDeSolicitudes'=>$tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes, 'data' => $data,'etiquetas' => $etiquetas ,'cantidades_asignadas' => $cantidades_asignadas]);

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
        
                // Agregar los datos al array
                $datosMesAMes[] = [
                    'mes' => $mes,
                    'anio' => $anio,
                    'total_solicitudes' => $totalSolicitudes
                ];
            }

            return response()->json(['solicitudes' => $propias, 'modificaciones'=> $totalModificaciones, 'total'=>$total, 'tiposDeSolicitudes'=>$tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes]);

        }

    }

}
