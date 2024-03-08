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
        $num = 0;
        $output= ""; // The output variable is defined and initialized
        $nodos = Nodo::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Nodo name

        // We use the loop foreach to iterate the aggregation of records
        foreach($nodos as $nodo){
            $output .= 
            '<tr>
                <td>' . ++$num . '</td>
                <td>' . $nodo->nombre . '</td>
                <td>' . $nodo->ciudade->nombre . '</td>
                <td>
                    <a href="' . route('nodos.show', $nodo->id) . '" class="btn btn-outline"
                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                        onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                        onmouseout="this.style.backgroundColor=\'#FFFF\';">
                        Detalle
                        <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    </a>

                    <a href="' . route('nodos.edit', $nodo->id) . '" class="btn btn-outline"
                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                        onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                        onmouseout="this.style.backgroundColor=\'#FFFF\';">
                        Editar
                        <i class="fa fa-pen-to-square fa-xs" style="color: #39a900;"></i>
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
        $ciudades = Ciudade::all();
        return view('nodo.create', compact('nodo', 'ciudades'));
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
