<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeModificacionesPorSolicitude;
use Illuminate\Http\Request;

/**
 * Class HistorialDeModificacionesPorSolicitudeController
 * @package App\Http\Controllers
 */
class HistorialDeModificacionesPorSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historialDeModificacionesPorSolicitudes = HistorialDeModificacionesPorSolicitude::paginate();

        return view('historial-de-modificaciones-por-solicitude.index', compact('historialDeModificacionesPorSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $historialDeModificacionesPorSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historialDeModificacionesPorSolicitude = new HistorialDeModificacionesPorSolicitude();
        return view('historial-de-modificaciones-por-solicitude.create', compact('historialDeModificacionesPorSolicitude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistorialDeModificacionesPorSolicitude::$rules);

        $historialDeModificacionesPorSolicitude = HistorialDeModificacionesPorSolicitude::create($request->all());

        return redirect()->route('historial-de-modificaciones-por-solicitudes.index')
            ->with('success', 'HistorialDeModificacionesPorSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historialDeModificacionesPorSolicitude = HistorialDeModificacionesPorSolicitude::find($id);

        return view('historial-de-modificaciones-por-solicitude.show', compact('historialDeModificacionesPorSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historialDeModificacionesPorSolicitude = HistorialDeModificacionesPorSolicitude::find($id);

        return view('historial-de-modificaciones-por-solicitude.edit', compact('historialDeModificacionesPorSolicitude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistorialDeModificacionesPorSolicitude $historialDeModificacionesPorSolicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialDeModificacionesPorSolicitude $historialDeModificacionesPorSolicitude)
    {
        request()->validate(HistorialDeModificacionesPorSolicitude::$rules);

        $historialDeModificacionesPorSolicitude->update($request->all());

        return redirect()->route('historial-de-modificaciones-por-solicitudes.index')
            ->with('success', 'HistorialDeModificacionesPorSolicitude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historialDeModificacionesPorSolicitude = HistorialDeModificacionesPorSolicitude::find($id)->delete();

        return redirect()->route('historial-de-modificaciones-por-solicitudes.index')
            ->with('success', 'HistorialDeModificacionesPorSolicitude deleted successfully');
    }
}
