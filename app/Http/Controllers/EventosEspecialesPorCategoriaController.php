<?php

namespace App\Http\Controllers;

use App\Models\EventosEspecialesPorCategoria;
use Illuminate\Http\Request;

/**
 * Class EventosEspecialesPorCategoriaController
 * @package App\Http\Controllers
 */
class EventosEspecialesPorCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventosEspecialesPorCategorias = EventosEspecialesPorCategoria::paginate();

        return view('eventos-especiales-por-categoria.index', compact('eventosEspecialesPorCategorias'))
            ->with('i', (request()->input('page', 1) - 1) * $eventosEspecialesPorCategorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventosEspecialesPorCategoria = new EventosEspecialesPorCategoria();
        return view('eventos-especiales-por-categoria.create', compact('eventosEspecialesPorCategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EventosEspecialesPorCategoria::$rules);

        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::create($request->all());

        return redirect()->route('eventos-especiales-por-categorias.index')
            ->with('success', 'EventosEspecialesPorCategoria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id);

        return view('eventos-especiales-por-categoria.show', compact('eventosEspecialesPorCategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id);

        return view('eventos-especiales-por-categoria.edit', compact('eventosEspecialesPorCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EventosEspecialesPorCategoria $eventosEspecialesPorCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventosEspecialesPorCategoria $eventosEspecialesPorCategoria)
    {
        request()->validate(EventosEspecialesPorCategoria::$rules);

        $eventosEspecialesPorCategoria->update($request->all());

        return redirect()->route('eventos-especiales-por-categorias.index')
            ->with('success', 'EventosEspecialesPorCategoria updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id)->delete();

    //     return redirect()->route('eventos-especiales-por-categorias.index')
    //         ->with('success', 'EventosEspecialesPorCategoria deleted successfully');
    // }
}
