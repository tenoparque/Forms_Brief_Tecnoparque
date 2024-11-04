<?php

namespace App\Http\Controllers;

use App\Models\Ciudade;
use App\Models\Departamento;
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

        $nodos = Nodo::with('ciudade', 'estado')->paginate(10);

        return view('nodo.index', compact('nodos'))
            ->with('i', (request()->input('page', 1) - 1) * $nodos->perPage());
    }

    public function search(Request $request)
    {
        $num = 0;
        $output = ""; // The output variable is defined and initialized
        $nodos = Nodo::where('nombre', 'LIKE', '%' . $request->search . '%')->get(); // We make the query through the Nodo name

        // We use the loop foreach to iterate the aggregation of records
        foreach ($nodos as $nodo) {
            $output .=
                '<tr>
                <td data-titulo="No">' . ++$num . '</td>
                <td data-titulo="Nombre">' . $nodo->nombre . '</td>
                <td data-titulo="Ciudad">' . $nodo->ciudade->nombre . '</td>
                <td>
                    <a href="' . route('nodos.show', $nodo->id) . '" class="btnDetalle">
                        
                        <i class="fa fa-eye fa-xs iconDCR" ></i>
                        Detalle
                    </a>

                    <a href="' . route('nodos.edit', $nodo->id) . '" class="btnEdit">
                        
                        <i class="fa fa-pen-to-square fa-xs iconEdit" ></i>Editar
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
        $departamentos = Departamento::with('ciudades')->get(); // Trae los departamentos con sus ciudades relacionadas

        return view('nodo.create', compact('nodo', 'departamentos'));
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

        // request()->validate(Nodo::$rules);

        $request->validate([
            'nombre' => ['required'],
            'id_ciudad' => ['required']
        ]);

        $nodo = Nodo::create($request->all());

        return redirect()->route('nodos.index')
            ->with('success', 'Nodo Creado Exitosamente');
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
        $departamentos = Departamento::with('ciudades')->get(); // Trae los departamentos con sus ciudades relacionadas
        $ciudades = Ciudade::all(); // Para la lista de ciudades

        return view('nodo.edit', compact('nodo', 'estados', 'departamentos', 'ciudades'));
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
            ->with('success', 'Nodo Actualizado Exitosamente');
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
