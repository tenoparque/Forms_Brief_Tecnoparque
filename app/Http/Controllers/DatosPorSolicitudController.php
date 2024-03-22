<?php

namespace App\Http\Controllers;

use App\Models\DatosPorSolicitud;
use Illuminate\Http\Request;

/**
 * Class DatosPorSolicitudController
 * @package App\Http\Controllers
 */
class DatosPorSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosPorSolicituds = DatosPorSolicitud::paginate();

        return view('datos-por-solicitud.index', compact('datosPorSolicituds'))
            ->with('i', (request()->input('page', 1) - 1) * $datosPorSolicituds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosPorSolicitud = new DatosPorSolicitud();
        return view('datos-por-solicitud.create', compact('datosPorSolicitud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DatosPorSolicitud::$rules);

        $datosPorSolicitud = DatosPorSolicitud::create($request->all());

        return redirect()->route('datos-por-solicituds.index')
            ->with('success', 'Dato Por Solicitud Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosPorSolicitud = DatosPorSolicitud::find($id);

        return view('datos-por-solicitud.show', compact('datosPorSolicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosPorSolicitud = DatosPorSolicitud::find($id);

        return view('datos-por-solicitud.edit', compact('datosPorSolicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DatosPorSolicitud $datosPorSolicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosPorSolicitud $datosPorSolicitud)
    {
        request()->validate(DatosPorSolicitud::$rules);

        $datosPorSolicitud->update($request->all());

        return redirect()->route('datos-por-solicituds.index')
            ->with('success', 'Dato Por Solicitud Actualizada Exitosamente');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $datosPorSolicitud = DatosPorSolicitud::find($id)->delete();

    //     return redirect()->route('datos-por-solicituds.index')
    //         ->with('success', 'DatosPorSolicitud deleted successfully');
    // }
}
