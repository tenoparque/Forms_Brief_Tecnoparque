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
       
        $data = DB::table('solicitudes')
        ->join('users', 'solicitudes.id_usuario_que_realiza_la_solicitud', '=', 'users.id')
        ->join('nodos', 'users.id_nodo', '=', 'nodos.id')
        ->select('nodos.nombre', DB::raw('COUNT(*) as total_solicitudes'))
        ->groupBy('nodos.nombre')
        ->orderBy('nodos.nombre')
        ->get();

        return view('home', compact('data'));
    }

    public function prueba()
{
    $usuarioAutenticado = Auth::user();
    $rolesPermitidos = ['Super Admin', 'Admin', 'Activador Nacional'];
    $rolSuperAdmin = $usuarioAutenticado->hasAnyRole($rolesPermitidos);
    $nodoUsuario = $usuarioAutenticado->id_nodo;
    
    if ($rolSuperAdmin) {
        $propias = Solicitude::count();
        $totalModificaciones = HistorialDeModificacionesPorSolicitude::count();
    } else {
        $propias = Solicitude::where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id)->count();
        
        $totalModificaciones = HistorialDeModificacionesPorSolicitude::whereIn('id_soli', function ($query) use ($usuarioAutenticado) {
            $query->select('id')
                  ->from('solicitudes')
                  ->where('id_usuario_que_realiza_la_solicitud', $usuarioAutenticado->id);
        })->count();
    }

    return response()->json(['solicitudes' => $propias, 'modificaciones'=> $totalModificaciones]);
}

}
