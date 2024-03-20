<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\ServiciosPorTiposDeSolicitude;
use App\Models\TiposDeSolicitude;
use Illuminate\Http\Request;

/**
 * Class ServiciosPorTiposDeSolicitudeController
 * @package App\Http\Controllers
 */
class ServiciosPorTiposDeSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviciosPorTiposDeSolicitudes = ServiciosPorTiposDeSolicitude::with('tiposDeSolicitude', 'estado')->paginate(10);

        return view('servicios-por-tipos-de-solicitude.index', compact('serviciosPorTiposDeSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $serviciosPorTiposDeSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviciosPorTiposDeSolicitude = new ServiciosPorTiposDeSolicitude();
        $estados = Estado::all();
        $solicitudes= TiposDeSolicitude::all();
        return view('servicios-por-tipos-de-solicitude.create', compact('serviciosPorTiposDeSolicitude', 'solicitudes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['id_estado' => 1]);

        request()->validate(ServiciosPorTiposDeSolicitude::$rules);

        $serviciosPorTiposDeSolicitude = ServiciosPorTiposDeSolicitude::create($request->all());

        return redirect()->route('servicios-por-tipos-de-solicitudes.index')
            ->with('success', 'ServiciosPorTiposDeSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviciosPorTiposDeSolicitude = ServiciosPorTiposDeSolicitude::find($id);

        return view('servicios-por-tipos-de-solicitude.show', compact('serviciosPorTiposDeSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviciosPorTiposDeSolicitude = ServiciosPorTiposDeSolicitude::find($id);
        $estados = Estado::all();
        $solicitudes= TiposDeSolicitude::all();

        return view('servicios-por-tipos-de-solicitude.edit', compact('serviciosPorTiposDeSolicitude', 'estados', 'solicitudes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiciosPorTiposDeSolicitude $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiciosPorTiposDeSolicitude $id)
    {
        request()->validate(ServiciosPorTiposDeSolicitude::$rules);

        $id->update($request->all());

        return redirect()->route('servicios-por-tipos-de-solicitudes.index')
            ->with('success', 'ServiciosPorTiposDeSolicitude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $serviciosPorTiposDeSolicitude = ServiciosPorTiposDeSolicitude::find($id)->delete();

    //     return redirect()->route('servicios-por-tipos-de-solicitudes.index')
    //         ->with('success', 'ServiciosPorTiposDeSolicitude deleted successfully');
    // }
}
