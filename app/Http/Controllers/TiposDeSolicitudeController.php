<?php

namespace App\Http\Controllers;

use App\Models\TiposDeSolicitude;
use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class TiposDeSolicitudeController
 * @package App\Http\Controllers
 */
class TiposDeSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDeSolicitudes = TiposDeSolicitude::paginate();

        return view('tipos-de-solicitude.index', compact('tiposDeSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposDeSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposDeSolicitude = new TiposDeSolicitude();
        $estados = Estado::all(); // We obtain all Estados models from the database
        return view('tipos-de-solicitude.create', compact('tiposDeSolicitude','estados')); // We pass the variables $tiposDeSolicitude and $estados to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TiposDeSolicitude::$rules);

        $tiposDeSolicitude = TiposDeSolicitude::create($request->all());

        return redirect()->route('tipos-de-solicitudes.index')
            ->with('success', 'TiposDeSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposDeSolicitude = TiposDeSolicitude::find($id);

        return view('tipos-de-solicitude.show', compact('tiposDeSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposDeSolicitude = TiposDeSolicitude::find($id);
        $estados = Estado::all(); // We obtain all Estados models from the database

        return view('tipos-de-solicitude.edit', compact('tiposDeSolicitude', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposDeSolicitude $tiposDeSolicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposDeSolicitude $tiposDeSolicitude)
    {
        request()->validate(TiposDeSolicitude::$rules);

        $tiposDeSolicitude->update($request->all());

        return redirect()->route('tipos-de-solicitudes.index')
            ->with('success', 'TiposDeSolicitude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $tiposDeSolicitude = TiposDeSolicitude::find($id)->delete();

    //     return redirect()->route('tipos-de-solicitudes.index')
    //         ->with('success', 'TiposDeSolicitude deleted successfully');
    // }
}
