<?php

namespace App\Http\Controllers;

use App\Models\TiposDeSolicitude;
use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class TiposDeSolicitudeController
 * @package App\Http\Controllers
 */
class TiposDeSolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDeSolicitudes = TiposDeSolicitude::with('estado')->paginate(10);

        return view('tipos-de-solicitude.index', compact('tiposDeSolicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposDeSolicitudes->perPage());
    }

    public function search(Request $request)
    {
        $output = ""; // The output variable is defined and initialized
        $tiposDeSolicitudes = TiposDeSolicitude::where('nombre', 'LIKE', '%' . $request->search . '%')->get(); // We make the query through the Tipo de Solicitud name

        // We use the loop foreach to iterate the aggregation of records
        foreach ($tiposDeSolicitudes as $tipoDeSolicitud) {
            $output .=
                '<tr>
                <td data-titulo="No">' . $tipoDeSolicitud->id . '</td>
                <td data-titulo="Nombre">' . $tipoDeSolicitud->nombre . '</td>
                <td data-titulo="Tipo de solicitud Nombre">' . $tipoDeSolicitud->estado->nombre . '</td>
                <td>
                    <a href="' . url('/tipos-de-solicitudes/' . $tipoDeSolicitud->id) . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    Detalle
                    </a>
                    <a href="' . url('/tipos-de-solicitudes/' . $tipoDeSolicitud->id . '/edit') . '" class="btn btn-outline"
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
        $tiposDeSolicitude = new TiposDeSolicitude();
        $estados = Estado::all(); // We obtain all Estados models from the database
        return view('tipos-de-solicitude.create', compact('tiposDeSolicitude')); // We pass the variables $tiposDeSolicitude and $estados to the view
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

        request()->validate(TiposDeSolicitude::$rules);

        $tiposDeSolicitude = TiposDeSolicitude::create($request->all());

        return redirect()->route('tipos-de-solicitudes.index')
            ->with('success', 'Tipo De Solicitud Creada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposDeSolicitude = TiposDeSolicitude::find($id);

        return view('tipos-de-solicitude.show', compact('tiposDeSolicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposDeSolicitude = TiposDeSolicitude::find($id);
        $estados = Estado::all(); // We obtain all Estados models from the database

        return view('tipos-de-solicitude.edit', compact('tiposDeSolicitude', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposDeSolicitude $tiposDeSolicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposDeSolicitude $tiposDeSolicitude)
    {
        request()->validate(TiposDeSolicitude::$rules);

        $tiposDeSolicitude->update($request->all());

        return redirect()->route('tipos-de-solicitudes.index')
            ->with('success', 'Tipos De Solicitud Actualizada Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $tiposDeSolicitude = TiposDeSolicitude::find($id)->delete();

    //     return redirect()->route('tipos-de-solicitudes.index')
    //         ->with('success', 'TiposDeSolicitude deleted successfully');
    // }
}
