<?php

namespace App\Http\Controllers;

use App\Models\CategoriasEventosEspeciale;
use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class CategoriasEventosEspecialeController
 * @package App\Http\Controllers
 */
class CategoriasEventosEspecialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasEventosEspeciales = CategoriasEventosEspeciale::paginate();

        return view('categorias-eventos-especiale.index', compact('categoriasEventosEspeciales'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasEventosEspeciales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasEventosEspeciale = new CategoriasEventosEspeciale();
        $estados = Estado::all();
        return view('categorias-eventos-especiale.create', compact('categoriasEventosEspeciale', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriasEventosEspeciale::$rules);

        $categoriasEventosEspeciale = CategoriasEventosEspeciale::create($request->all());

        return redirect()->route('categorias-eventos-especiales.index')
            ->with('success', 'CategoriasEventosEspeciale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id);

        return view('categorias-eventos-especiale.show', compact('categoriasEventosEspeciale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id);

        return view('categorias-eventos-especiale.edit', compact('categoriasEventosEspeciale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriasEventosEspeciale $categoriasEventosEspeciale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasEventosEspeciale $categoriasEventosEspeciale)
    {
        request()->validate(CategoriasEventosEspeciale::$rules);

        $categoriasEventosEspeciale->update($request->all());

        return redirect()->route('categorias-eventos-especiales.index')
            ->with('success', 'CategoriasEventosEspeciale updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id)->delete();

    //     return redirect()->route('categorias-eventos-especiales.index')
    //         ->with('success', 'CategoriasEventosEspeciale deleted successfully');
    // }
}
