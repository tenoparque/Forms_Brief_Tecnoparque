<?php

namespace App\Http\Controllers;

use App\Models\Ciudade;
use App\Models\Departamento;
use Illuminate\Http\Request;

/**
 * Class CiudadeController
 * @package App\Http\Controllers
 */
class CiudadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudade::with('departamento')->paginate();

        return view('ciudade.index', compact('ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * $ciudades->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $ciudades = Ciudade::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Ciudad name

        // We use the loop foreach to iterate the aggregation of records
        foreach($ciudades as $ciudade){
            $output .= 
            '<tr>
                <td>' . $ciudade->id . '</td>
                <td>' . $ciudade->nombre . '</td>
                <td>' . $ciudade->departamento->nombre . '</td>
                <td>
                    <a href="' . url('/ciudades/' . $ciudade->id) . '" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-eye"></i> Show
                    </a>
                    <a href="' . url('/ciudades/' . $ciudade->id . '/edit') . '" class="btn btn-sm btn-success">
                        <i class="fa fa-fw fa-edit"></i> Edit
                    </a>
                </td>
            </tr>';
        }

        return response($output); // We return the response by sending as parameter the output variable
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudade = new Ciudade();
        $departamentos = Departamento::all(); // We obtain all Departamentos models from the database

        return view('ciudade.create', compact('ciudade','departamentos')); // We pass the variables $ciudade and $departamentos to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ciudade::$rules);

        $ciudade = Ciudade::create($request->all());

        return redirect()->route('ciudades.index')
            ->with('success', 'Ciudade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudade = Ciudade::find($id);

        return view('ciudade.show', compact('ciudade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudade = Ciudade::find($id);
        $departamentos = Departamento::all(); // We obtain all Departamentos models from the database


        return view('ciudade.edit', compact('ciudade', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ciudade $ciudade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudade $ciudade)
    {
        request()->validate(Ciudade::$rules);

        $ciudade->update($request->all());

        return redirect()->route('ciudades.index')
            ->with('success', 'Ciudade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $ciudade = Ciudade::find($id)->delete();

    //     return redirect()->route('ciudades.index')
    //         ->with('success', 'Ciudade deleted successfully');
    // }
}
