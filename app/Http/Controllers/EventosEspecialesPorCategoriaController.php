<?php

namespace App\Http\Controllers;

use App\Models\CategoriasEventosEspeciale;
use App\Models\EventosEspecialesPorCategoria;
use App\Models\Estado;

use Illuminate\Http\Request;

/**
 * Class EventosEspecialesPorCategoriaController
 * @package App\Http\Controllers
 */
class EventosEspecialesPorCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventosEspecialesPorCategorias = EventosEspecialesPorCategoria::with('estado','categoriasEventosEspeciale')->paginate(10);

        return view('eventos-especiales-por-categoria.index', compact('eventosEspecialesPorCategorias'))
            ->with('i', (request()->input('page', 1) - 1) * $eventosEspecialesPorCategorias->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $eventosEspeciales = EventosEspecialesPorCategoria::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Ciudad name
        // We use the loop foreach to iterate the aggregation of records
        foreach($eventosEspeciales as $evento){
            $output .= 
            '<tr>
                <td data-titulo="No">' . $evento->id . '</td>
                <td data-titulo="Nombre">' . $evento->nombre . '</td>
                <td data-titulo="Estado">' . $evento->estado->nombre . '</td>
                <td data-titulo="Categoria Eventos Especiales">' . $evento->categoriasEventosEspeciale->nombre . '</td>
                <td>
                    <a href="' . url('/eventos-especiales-por-categorias/' . $evento->id) . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    Detalle
                    </a>
                    <a href="' . url('/eventos-especiales-por-categoria/' . $evento->id . '/edit') . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                    Editar
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
        $eventosEspecialesPorCategoria = new EventosEspecialesPorCategoria();
        $estados = Estado::all();
        $categorias = CategoriasEventosEspeciale::where('id_estado', 1)->get();
        return view('eventos-especiales-por-categoria.create', compact('eventosEspecialesPorCategoria', 'categorias'));
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

        request()->validate(EventosEspecialesPorCategoria::$rules);

        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::create($request->all());

        return redirect()->route('eventos-especiales-por-categorias.index')
            ->with('success', 'Evento Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id);

        return view('eventos-especiales-por-categoria.show', compact('eventosEspecialesPorCategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id);
        $estados = Estado::all();
        $categorias = categoriasEventosEspeciale::all();

        return view('eventos-especiales-por-categoria.edit', compact('eventosEspecialesPorCategoria', 'estados', 'categorias'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EventosEspecialesPorCategoria $eventosEspecialesPorCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventosEspecialesPorCategoria $eventosEspecialesPorCategoria)
    {
        request()->validate(EventosEspecialesPorCategoria::$rules);

        $eventosEspecialesPorCategoria->update($request->all());

        return redirect()->route('eventos-especiales-por-categorias.index')
            ->with('success', 'Evento Actualizado Exitosamente');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $eventosEspecialesPorCategoria = EventosEspecialesPorCategoria::find($id)->delete();

    //     return redirect()->route('eventos-especiales-por-categorias.index')
    //         ->with('success', 'EventosEspecialesPorCategoria deleted successfully');
    // }
}
