<?php

namespace App\Http\Controllers;

use App\Models\Personalizacione;
use Illuminate\Http\Request;

/**
 * Class PersonalizacioneController
 * @package App\Http\Controllers
 */
class PersonalizacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizaciones = Personalizacione::paginate();

        return view('personalizacione.index', compact('personalizaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $personalizaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personalizacione = new Personalizacione();
        return view('personalizacione.create', compact('personalizacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Personalizacione::$rules);

        $personalizacione = Personalizacione::create($request->all());

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalizacione = Personalizacione::find($id);

        return view('personalizacione.show', compact('personalizacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalizacione = Personalizacione::find($id);

        return view('personalizacione.edit', compact('personalizacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Personalizacione $personalizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalizacione $personalizacione)
    {
        request()->validate(Personalizacione::$rules);

        $personalizacione->update($request->all());

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $personalizacione = Personalizacione::find($id)->delete();

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacione deleted successfully');
    }
}
