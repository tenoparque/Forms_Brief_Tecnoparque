<?php

namespace App\Http\Controllers;

use App\Models\ElementosPorSolicitude;
use Illuminate\Http\Request;

/**
 * Class ElementosPorSolicitudeController
 * @package App\Http\Controllers
 */
class ElementosPorSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elementosPorSolicitudes = ElementosPorSolicitude::paginate(10);

        return view('elementos-por-solicitude.index', compact('elementosPorSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $elementosPorSolicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elementosPorSolicitude = new ElementosPorSolicitude();
        return view('elementos-por-solicitude.create', compact('elementosPorSolicitude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ElementosPorSolicitude::$rules);

        $elementosPorSolicitude = ElementosPorSolicitude::create($request->all());

        return redirect()->route('elementos-por-solicitudes.index')
            ->with('success', 'ElementosPorSolicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elementosPorSolicitude = ElementosPorSolicitude::find($id);

        return view('elementos-por-solicitude.show', compact('elementosPorSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elementosPorSolicitude = ElementosPorSolicitude::find($id);

        return view('elementos-por-solicitude.edit', compact('elementosPorSolicitude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ElementosPorSolicitude $elementosPorSolicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElementosPorSolicitude $elementosPorSolicitude)
    {
        request()->validate(ElementosPorSolicitude::$rules);

        $elementosPorSolicitude->update($request->all());

        return redirect()->route('elementos-por-solicitudes.index')
            ->with('success', 'ElementosPorSolicitude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $elementosPorSolicitude = ElementosPorSolicitude::find($id)->delete();

        return redirect()->route('elementos-por-solicitudes.index')
            ->with('success', 'ElementosPorSolicitude deleted successfully');
    }
}
