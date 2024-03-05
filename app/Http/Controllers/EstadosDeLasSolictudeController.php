<?php

namespace App\Http\Controllers;

use App\Models\EstadosDeLasSolictude;
use App\Models\Estado;
use Illuminate\Http\Request;

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
        $output= ""; // The output variable is defined and initialized
        $estadosDeLasSolicitudes = EstadosDeLasSolictude::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Estado de la Solicitud name

        // We use the loop foreach to iterate the aggregation of records
        foreach($estadosDeLasSolicitudes as $estadosDeLaSolicitud){
            $output .= 
            '<tr>
                <td>' . $estadosDeLaSolicitud->id . '</td>
                <td>' . $estadosDeLaSolicitud->nombre . '</td>
                <td>' . $estadosDeLaSolicitud->estado->nombre . '</td>
                <td>
                    <a href="' . url('/estados-de-las-solictudes/' . $estadosDeLaSolicitud->id) . '" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-eye"></i> Show
                    </a>
                    <a href="' . url('/estados-de-las-solictudes/' . $estadosDeLaSolicitud->id . '/edit') . '" class="btn btn-sm btn-success">
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
        $estadosDeLasSolictude = new EstadosDeLasSolictude();
        $estados = Estado::all(); // We obtain all Estados models from the database
        return view('estados-de-las-solictude.create', compact('estadosDeLasSolictude','estados')); // We pass the variables $estadosDeLasSolictude and $estados to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadosDeLasSolictude::$rules);

        $estadosDeLasSolictude = EstadosDeLasSolictude::create($request->all());

        return redirect()->route('estados-de-las-solictudes.index')
            ->with('success', 'EstadosDeLasSolictude created successfully.');
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
            ->with('success', 'EstadosDeLasSolictude updated successfully');
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
}
