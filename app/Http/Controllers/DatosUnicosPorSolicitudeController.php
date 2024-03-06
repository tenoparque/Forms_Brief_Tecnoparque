<?php

namespace App\Http\Controllers;

use App\Models\DatosUnicosPorSolicitude;
use App\Models\Estado;
use App\Models\TiposDeDato;
use App\Models\TiposDeSolicitude;
use Illuminate\Http\Request;

/**
 * Class DatosUnicosPorSolicitudeController
 * @package App\Http\Controllers
 */
class DatosUnicosPorSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUnicosPorSolicitudes = DatosUnicosPorSolicitude::with('tiposDeDato','tiposDeSolicitude','estado')->paginate();

        return view('datos-unicos-por-solicitude.index', compact('datosUnicosPorSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $datosUnicosPorSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosUnicosPorSolicitude = new DatosUnicosPorSolicitude();
        $estados = Estado::all();
        $tiposDatos = TiposDeDato::all();
        $solicitudes = TiposDeSolicitude::all();
        return view('datos-unicos-por-solicitude.create', compact('datosUnicosPorSolicitude' , 'tiposDatos' , 'solicitudes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DatosUnicosPorSolicitude::$rules);

        $request->merge(['id_estados' => 1]);

        $datosUnicosPorSolicitude = DatosUnicosPorSolicitude::create($request->all());

        return redirect()->route('datos-unicos-por-solicitudes.index')
            ->with('success', 'DatosUnicosPorSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosUnicosPorSolicitude = DatosUnicosPorSolicitude::find($id);

        return view('datos-unicos-por-solicitude.show', compact('datosUnicosPorSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosUnicosPorSolicitude = DatosUnicosPorSolicitude::find($id);
        $estados = Estado::all();
        $tiposDatos = TiposDeDato::all();
        $solicitudes = TiposDeSolicitude::all();

        return view('datos-unicos-por-solicitude.edit', compact('datosUnicosPorSolicitude', 'estados', 'tiposDatos', 'solicitudes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DatosUnicosPorSolicitude $datosUnicosPorSolicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosUnicosPorSolicitude $datosUnicosPorSolicitude)
    {
        request()->validate(DatosUnicosPorSolicitude::$rules);

        $datosUnicosPorSolicitude->update($request->all());

        return redirect()->route('datos-unicos-por-solicitudes.index')
            ->with('success', 'DatosUnicosPorSolicitude updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $datosUnicosPorSolicitude = DatosUnicosPorSolicitude::find($id)->delete();

    //     return redirect()->route('datos-unicos-por-solicitudes.index')
    //         ->with('success', 'DatosUnicosPorSolicitude deleted successfully');
    // }
}
