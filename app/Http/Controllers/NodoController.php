<?php

namespace App\Http\Controllers;

use App\Models\Ciudade;
use App\Models\Estado;
use App\Models\Nodo;
use Illuminate\Http\Request;

/**
 * Class NodoController
 * @package App\Http\Controllers
 */
class NodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $nodos = Nodo::with('ciudade','estado')->paginate();

        return view('nodo.index', compact('nodos'))
            ->with('i', (request()->input('page', 1) - 1) * $nodos->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $nodos = Nodo::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Nodo name

        // We use the loop foreach to iterate the aggregation of records
        foreach($nodos as $nodo){
            $output .= 
            '<tr>
                <td>' . $nodo->id . '</td>
                <td>' . $nodo->nombre . '</td>
                <td>' . $nodo->estado->nombre . '</td>
                <td>' . $nodo->ciudade->nombre . '</td>
                <td>
                    <a href="' . url('/nodos/' . $nodo->id) . '" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-eye"></i> Show
                    </a>
                    <a href="' . url('/nodos/' . $nodo->id . '/edit') . '" class="btn btn-sm btn-success">
                        <i class="fa fa-fw fa-edit"></i> Edit
                    </a>
                </td>
            </tr>';
        }

        return response($output); // We return the response by sending as parameter the output variable
    }

    /**
     * 
     
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nodo = new Nodo();
        $estados = Estado::all();
        $ciudades = Ciudade::all();
        return view('nodo.create', compact('nodo', 'estados', 'ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nodo::$rules);

        $nodo = Nodo::create($request->all());

        return redirect()->route('nodos.index')
            ->with('success', 'Nodo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nodo = Nodo::find($id);

        return view('nodo.show', compact('nodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nodo = Nodo::find($id);
        $estados = Estado::all();
        $ciudades = Ciudade::all();

        return view('nodo.edit', compact('nodo', 'estados', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nodo $nodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nodo $nodo)
    {
        request()->validate(Nodo::$rules);

        $nodo->update($request->all());

        return redirect()->route('nodos.index')
            ->with('success', 'Nodo updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $nodo = Nodo::find($id)->delete();

    //     return redirect()->route('nodos.index')
    //         ->with('success', 'Nodo deleted successfully');
    // }
}
