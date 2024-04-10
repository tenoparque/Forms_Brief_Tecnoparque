<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeModificacionesPorSolicitude;
use Illuminate\Http\Request;
use App\Models\Solicitude;
use App\Models\Nodo;
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


            return response()->json(['solicitudes' => $propias, 'modificaciones'=> $totalModificaciones, 'total'=>$total, 'tiposDeSolicitudes'=>$tiposDeSolicitudes, 'datos_mes_a_mes' => $datosMesAMes, 'data' => $data ]);

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
