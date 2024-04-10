<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\TiposDeDato;
use Illuminate\Http\Request;

/**
 * Class TiposDeDatoController
 * @package App\Http\Controllers
 */
class TiposDeDatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDeDatos = TiposDeDato::with('estado')->paginate(10);

        return view('tipos-de-dato.index', compact('tiposDeDatos'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposDeDatos->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $tiposDatos = TiposDeDato::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Ciudad name

        // We use the loop foreach to iterate the aggregation of records
        foreach($tiposDatos as $tipo){
            $output .= 
            '<tr>
                <td data-titulo="No">' . $tipo->id . '</td>
                <td data-titulo="Nombre">' . $tipo->nombre . '</td>
                <td data-titulo="Estado">' . $tipo->estado->nombre . '</td>
                <td >
                    <a href="' . url('/tipos-de-datos/' . $tipo->id) . '" class="btnDetalle">
                        <i class="fa fa-fw fa-eye iconDCR"></i> Detalle
                    </a>
                    <a href="' . url('/tipos-de-datos/' . $tipo->id . '/edit') . '" class="btnEdit">
                        <i class="fa fa-fw fa-edit iconEdit"></i> Editar
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
        $tiposDeDato = new TiposDeDato();
        $estados = Estado::all();
        return view('tipos-de-dato.create', compact('tiposDeDato' , 'estados'));
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

        request()->validate(TiposDeDato::$rules);

        $tiposDeDato = TiposDeDato::create($request->all());

        return redirect()->route('tipos-de-datos.index')
            ->with('success', 'Tipos De Dato Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposDeDato = TiposDeDato::find($id);

        return view('tipos-de-dato.show', compact('tiposDeDato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposDeDato = TiposDeDato::find($id);
        $estados = Estado::all();

        return view('tipos-de-dato.edit', compact('tiposDeDato', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposDeDato $tiposDeDato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposDeDato $tiposDeDato)
    {
        request()->validate(TiposDeDato::$rules);

        $tiposDeDato->update($request->all());

        return redirect()->route('tipos-de-datos.index')
            ->with('success', 'Tipos De Dato Actualizado Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $tiposDeDato = TiposDeDato::find($id)->delete();

    //     return redirect()->route('tipos-de-datos.index')
    //         ->with('success', 'TiposDeDato deleted successfully');
    // }
}
