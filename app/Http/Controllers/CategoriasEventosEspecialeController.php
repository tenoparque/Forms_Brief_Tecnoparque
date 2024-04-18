<?php

namespace App\Http\Controllers;

use App\Models\CategoriasEventosEspeciale;
use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class CategoriasEventosEspecialeController
 * @package App\Http\Controllers
 */
class CategoriasEventosEspecialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriasEventosEspeciales = CategoriasEventosEspeciale::with('estado')->paginate(10);

        return view('categorias-eventos-especiale.index', compact('categoriasEventosEspeciales'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriasEventosEspeciales->perPage());
    }

    public function search(Request $request)
    {
        $output = ""; // The output variable is defined and initialized
        $categoriasEventosEspeciales = CategoriasEventosEspeciale::where('nombre', 'LIKE', '%' . $request->search . '%')->get(); // We make the query through the Estado de la Solicitud name

        // We use the loop foreach to iterate the aggregation of records
        foreach ($categoriasEventosEspeciales as $categoriaEventosEspecial) {
            $output .=
                '<tr>
                <td data-titulo="No">' . $categoriaEventosEspecial->id . '</td>
                <td data-titulo="Nombre">' . $categoriaEventosEspecial->nombre . '</td>
                <td data-titulo="Estado">' . $categoriaEventosEspecial->estado->nombre . '</td>
                <td data-titulo="">
                    <a href="' . url('/categorias-eventos-especiales/' . $categoriaEventosEspecial->id) . '" class="btnDetalle">
                        <i class="fa fa-fw fa-eye iconDCR"></i> Detalle
                    </a>
                    <a href="' . url('/categorias-eventos-especiales/' . $categoriaEventosEspecial->id . '/edit') . '" class="btnEdit">
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
        $categoriasEventosEspeciale = new CategoriasEventosEspeciale();
        $estados = Estado::all();
        return view('categorias-eventos-especiale.create', compact('categoriasEventosEspeciale'));
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

        request()->validate(CategoriasEventosEspeciale::$rules);

        $categoriasEventosEspeciale = CategoriasEventosEspeciale::create($request->all());

        return redirect()->route('categorias-eventos-especiales.index')
            ->with('success', 'Eventos Especiales creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id);

        return view('categorias-eventos-especiale.show', compact('categoriasEventosEspeciale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id);
        $estados = Estado::all();

        return view('categorias-eventos-especiale.edit', compact('categoriasEventosEspeciale', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriasEventosEspeciale $categoriasEventosEspeciale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasEventosEspeciale $categoriasEventosEspeciale)
    {
        request()->validate(CategoriasEventosEspeciale::$rules);

        $categoriasEventosEspeciale->update($request->all());

        return redirect()->route('categorias-eventos-especiales.index')
            ->with('success', 'Categoria Actualizada Exitosamente');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $categoriasEventosEspeciale = CategoriasEventosEspeciale::find($id)->delete();

    //     return redirect()->route('categorias-eventos-especiales.index')
    //         ->with('success', 'CategoriasEventosEspeciale deleted successfully');
    // }
}
