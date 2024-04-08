<?php

namespace App\Http\Controllers;

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
        $usuarioAutenticado = Auth::user();
        $propias = Solicitude::with('id_usuario_de_la_solicitud', $usuarioAutenticado)->count();
        $data = DB::table('solicitudes')
        ->join('users', 'solicitudes.id_usuario_que_realiza_la_solicitud', '=', 'users.id')
        ->join('nodos', 'users.id_nodo', '=', 'nodos.id')
        ->select('nodos.nombre', DB::raw('COUNT(*) as total_solicitudes'))
        ->groupBy('nodos.nombre')
        ->orderBy('nodos.nombre')
        ->get();

        return view('home', compact('data', 'propias'));
    }
}
