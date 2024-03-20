<?php

namespace App\Http\Controllers;

use App\Models\HistorialDeUsuariosPorSolicitude;
use App\Http\Requests\HistorialDeUsuariosPorSolicitudeRequest;

/**
 * Class HistorialDeUsuariosPorSolicitudeController
 * @package App\Http\Controllers
 */
class HistorialDeUsuariosPorSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historialDeUsuariosPorSolicitudes = HistorialDeUsuariosPorSolicitude::paginate();

        return view('historial-de-usuarios-por-solicitude.index', compact('historialDeUsuariosPorSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $historialDeUsuariosPorSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $historialDeUsuariosPorSolicitude = new HistorialDeUsuariosPorSolicitude();
        return view('historial-de-usuarios-por-solicitude.create', compact('historialDeUsuariosPorSolicitude'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistorialDeUsuariosPorSolicitudeRequest $request)
    {
        HistorialDeUsuariosPorSolicitude::create($request->validated());

        return redirect()->route('historial-de-usuarios-por-solicitudes.index')
            ->with('success', 'HistorialDeUsuariosPorSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historialDeUsuariosPorSolicitude = HistorialDeUsuariosPorSolicitude::find($id);

        return view('historial-de-usuarios-por-solicitude.show', compact('historialDeUsuariosPorSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historialDeUsuariosPorSolicitude = HistorialDeUsuariosPorSolicitude::find($id);

        return view('historial-de-usuarios-por-solicitude.edit', compact('historialDeUsuariosPorSolicitude'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistorialDeUsuariosPorSolicitudeRequest $request, HistorialDeUsuariosPorSolicitude $historialDeUsuariosPorSolicitude)
    {
        $historialDeUsuariosPorSolicitude->update($request->validated());

        return redirect()->route('historial-de-usuarios-por-solicitudes.index')
            ->with('success', 'HistorialDeUsuariosPorSolicitude updated successfully');
    }

    public function destroy($id)
    {
        HistorialDeUsuariosPorSolicitude::find($id)->delete();

        return redirect()->route('historial-de-usuarios-por-solicitudes.index')
            ->with('success', 'HistorialDeUsuariosPorSolicitude deleted successfully');
    }
}
