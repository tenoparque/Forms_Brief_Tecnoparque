<?php

namespace App\Http\Controllers;

use App\Models\EstadosDeLasSolictude;
use Illuminate\Http\Request;

/**
 * Class EstadosDeLasSolictudeController
 * @package App\Http\Controllers
 */
class EstadosDeLasSolictudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosDeLasSolictudes = EstadosDeLasSolictude::paginate();

        return view('estados-de-las-solictude.index', compact('estadosDeLasSolictudes'))
            ->with('i', (request()->input('page', 1) - 1) * $estadosDeLasSolictudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadosDeLasSolictude = new EstadosDeLasSolictude();
        return view('estados-de-las-solictude.create', compact('estadosDeLasSolictude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadosDeLasSolictude::$rules);

        $estadosDeLasSolictude = EstadosDeLasSolictude::create($request->all());

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'EstadosDeLasSolictude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadosDeLasSolictude = EstadosDeLasSolictude::find($id);

        return view('estados-de-las-solictude.show', compact('estadosDeLasSolictude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadosDeLasSolictude = EstadosDeLasSolictude::find($id);

        return view('estados-de-las-solictude.edit', compact('estadosDeLasSolictude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadosDeLasSolictude $estadosDeLasSolictude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadosDeLasSolictude $estadosDeLasSolictude)
    {
        request()->validate(EstadosDeLasSolictude::$rules);

        $estadosDeLasSolictude->update($request->all());

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'EstadosDeLasSolictude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadosDeLasSolictude = EstadosDeLasSolictude::find($id)->delete();

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'EstadosDeLasSolictude deleted successfully');
    }
}
