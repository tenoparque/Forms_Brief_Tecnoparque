<?php

namespace App\Http\Controllers;

use App\Models\Personalizacione;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class PersonalizacioneController
 * @package App\Http\Controllers
 */
class PersonalizacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizaciones = Personalizacione::with('estado')->paginate();
        $usuarios = User::all();

        return view('personalizacione.index', compact('personalizaciones' , 'usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $personalizaciones->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $personalizaciones = Personalizacione::where('id_users', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Ciudad name
        $persona = User::with('id',$personalizaciones, '%'.$request -> search.'%')->get();
        // We use the loop foreach to iterate the aggregation of records
        foreach($personalizaciones as $personalizacion){
            $output .= 
            '<tr>
                <td>' . $personalizacion->id . '</td>
                <td>' . $personalizacion->logo . '</td>
                <td>' . $personalizacion->color_principal . '</td>
                <td>' . $personalizacion->color_secundario . '</td>
                <td>' . $personalizacion->color_terciario . '</td>
                <td>' . $personalizacion->id_users . '</td>
                <td>' . $personalizacion->estado->nombre . '</td>
                
                <td>
                    <a href="' . url('/personalizaciones/' . $personalizacion->id) . '" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-eye"></i> Show
                    </a>
                    <a href="' . url('/personalizaciones/' . $personalizacion->id . '/edit') . '" class="btn btn-sm btn-success">
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
        $personalizacione = new Personalizacione();
        $estados = Estado::all();
        return view('personalizacione.create', compact('personalizacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuarioId = Auth::id();

        $request->merge([
            'id_users' => $usuarioId,
            'id_estado' => 1
        ]);

        request()->validate(Personalizacione::$rules);

        $personalizacione = Personalizacione::create($request->all());

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalizacione = Personalizacione::find($id);

        return view('personalizacione.show', compact('personalizacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalizacione = Personalizacione::find($id);
        $estados = Estado::all();

        return view('personalizacione.edit', compact('personalizacione', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Personalizacione $personalizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalizacione $personalizacione)
    {

        $usuarioId = Auth::id();

        $request->merge([
            'id_users' => $usuarioId,
            'id_estado' => 1
        ]);

        request()->validate(Personalizacione::$rules);

        $personalizacione->update($request->all());

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacione updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $personalizacione = Personalizacione::find($id)->delete();

    //     return redirect()->route('personalizaciones.index')
    //         ->with('success', 'Personalizacione deleted successfully');
    // }
}
