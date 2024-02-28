<?php

namespace App\Http\Controllers;

use App\Models\Politica;
use Illuminate\Http\Request;

/**
 * Class PoliticaController
 * @package App\Http\Controllers
 */
class PoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politicas = Politica::paginate();

        return view('politica.index', compact('politicas'))
            ->with('i', (request()->input('page', 1) - 1) * $politicas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $politica = new Politica();
        return view('politica.create', compact('politica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Politica::$rules);

        $politica = Politica::create($request->all());

        return redirect()->route('politicas.index')
            ->with('success', 'Politica created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $politica = Politica::find($id);

        return view('politica.show', compact('politica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $politica = Politica::find($id);

        return view('politica.edit', compact('politica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Politica $politica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Politica $politica)
    {
        request()->validate(Politica::$rules);

        $politica->update($request->all());

        return redirect()->route('politicas.index')
            ->with('success', 'Politica updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $politica = Politica::find($id)->delete();

        return redirect()->route('politicas.index')
            ->with('success', 'Politica deleted successfully');
    }
}
