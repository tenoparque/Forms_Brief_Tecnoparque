<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\TiposDeDato;
use Illuminate\Http\Request;

/**
 * Class TiposDeDatoController
 * @package App\Http\Controllers
 */
class TiposDeDatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDeDatos = TiposDeDato::with('estado')->paginate();

        return view('tipos-de-dato.index', compact('tiposDeDatos'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposDeDatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposDeDato = new TiposDeDato();
        $estados = Estado::all();
        return view('tipos-de-dato.create', compact('tiposDeDato' , 'estados'));
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

        request()->validate(TiposDeDato::$rules);

        $tiposDeDato = TiposDeDato::create($request->all());

        return redirect()->route('tipos-de-datos.index')
            ->with('success', 'TiposDeDato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposDeDato = TiposDeDato::find($id);

        return view('tipos-de-dato.show', compact('tiposDeDato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposDeDato = TiposDeDato::find($id);
        $estados = Estado::all();

        return view('tipos-de-dato.edit', compact('tiposDeDato', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposDeDato $tiposDeDato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposDeDato $tiposDeDato)
    {
        request()->validate(TiposDeDato::$rules);

        $tiposDeDato->update($request->all());

        return redirect()->route('tipos-de-datos.index')
            ->with('success', 'TiposDeDato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $tiposDeDato = TiposDeDato::find($id)->delete();

    //     return redirect()->route('tipos-de-datos.index')
    //         ->with('success', 'TiposDeDato deleted successfully');
    // }
}
