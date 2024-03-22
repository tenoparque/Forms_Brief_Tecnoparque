<?php

namespace App\Http\Controllers;

use App\Models\EstadosDeLasSolictude;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class EstadosDeLasSolictudeController
 * @package App\Http\Controllers
 */
class EstadosDeLasSolictudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosDeLasSolictudes = EstadosDeLasSolictude::with('estado')->paginate();

        return view('estados-de-las-solictude.index', compact('estadosDeLasSolictudes'))
            ->with('i', (request()->input('page', 1) - 1) * $estadosDeLasSolictudes->perPage());
    }

    public function search(Request $request)
    {
        $output = ""; // The output variable is defined and initialized
        $estadosDeLasSolicitudes = EstadosDeLasSolictude::where('nombre', 'LIKE', '%' . $request->search . '%')->get(); // We make the query through the Estado de la Solicitud name

        // We use the loop foreach to iterate the aggregation of records
        foreach ($estadosDeLasSolicitudes as $estadosDeLaSolicitud) {
            $output .=
                '<tr>
                <td>' . $estadosDeLaSolicitud->id . '</td>
                <td>' . $estadosDeLaSolicitud->nombre . '</td>
                <td>' . $estadosDeLaSolicitud->estado->nombre . '</td>
                <td>' . $estadosDeLaSolicitud->orden_mostrado . '</td>
                <td>
                    <a href="' . url('/estados-de-las-solictudes/' . $estadosDeLaSolicitud->id) . '" class="btn btn-outline"
                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    Detalle
                    </a>
                    <a href="' . url('/estados-de-las-solictudes/' . $estadosDeLaSolicitud->id . '/edit') . '" class="btn btn-outline"
                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
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
        $estadosDeLasSolictude = new EstadosDeLasSolictude();
        $ultimoOrdenMostrado = EstadosDeLasSolictude::max('orden_mostrado');
        $estados = Estado::all(); // We obtain all Estados models from the database
        return view('estados-de-las-solictude.create', compact('estadosDeLasSolictude', 'ultimoOrdenMostrado')); // We pass the variables $estadosDeLasSolictude and $estados to the view
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

        request()->validate(EstadosDeLasSolictude::$rules);

        $estadosDeLasSolictude = EstadosDeLasSolictude::create($request->all());

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'Estado de la Solicitud Creada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadosDeLasSolictude = EstadosDeLasSolictude::find($id);

        return view('estados-de-las-solictude.show', compact('estadosDeLasSolictude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadosDeLasSolictude = EstadosDeLasSolictude::find($id);
        $estados = Estado::all(); // We obtain all Estados models from the database

        return view('estados-de-las-solictude.edit', compact('estadosDeLasSolictude', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadosDeLasSolictude $estadosDeLasSolictude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadosDeLasSolictude $estadosDeLasSolictude)
    {
        request()->validate(EstadosDeLasSolictude::$rules);

        $estadosDeLasSolictude->update($request->all());

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'Estado De La Solictud Actualizada Exitosamente');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $estadosDeLasSolictude = EstadosDeLasSolictude::find($id)->delete();

    //     return redirect()->route('estados-de-las-solictudes.index')
    //         ->with('success', 'EstadosDeLasSolictude deleted successfully');
    // }

    public function editarOrden()
    {
        $estadosDeLasSolictudes = EstadosDeLasSolictude::with('estado')->get();
        return view('estados-de-las-solictude.editar-orden', compact('estadosDeLasSolictudes'));
    }



    public function actualizarOrden(Request $request)
    {
        // validates that there are no duplicates in the orden_mostrado of the records
        $request->validate([
            'orden_mostrado.*' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    $existingOrdenMostrado = EstadosDeLasSolictude::whereIn('id', array_keys($request->orden_mostrado))
                        ->pluck('orden_mostrado')
                        ->toArray();

                    $duplicates = array_diff_assoc($existingOrdenMostrado, array_unique($existingOrdenMostrado));

                    // Checking for duplicates in the displayed orden_mostrado numbers
                    if (!empty ($duplicates)) {
                        $fail('No se pueden tener números de orden mostrado duplicados.');
                    }
                },
            ],
        ]);

        // It will iterate to each record obtained.
        foreach ($request->orden_mostrado as $id => $orden) {
            EstadosDeLasSolictude::where('id', $id)->update(['orden_mostrado' => $orden]); // The database record containing the same id as the id of the previously obtained record will be edited.
        }

        return redirect()->route('estados-de-las-solictudes.index')->with('success', 'Orden Mostrado Actualizada Exitosamente'); // The index view is redirected to the estados-de-las-solictudes view if the displayed order has been updated correctly.
    }
}
