<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

/**
 * Class DepartamentoController
 * @package App\Http\Controllers
 */
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::paginate();

        return view('departamento.index', compact('departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $departamentos->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $departamentos = Departamento::where('nombre', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Departamento name

        // We use the loop foreach to iterate the aggregation of records
        foreach($departamentos as $departamento){
            $output .= 
            '<tr>
                <td>' . $departamento->id . '</td>
                <td>' . $departamento->nombre . '</td>
                <td>
                    <a href="' . url('/departamentos/' . $departamento->id) . '" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-eye"></i> Show
                    </a>
                    <a href="' . url('/departamentos/' . $departamento->id . '/edit') . '" class="btn btn-sm btn-success">
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
        $departamento = new Departamento();
        return view('departamento.create', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Departamento::$rules);

        $departamento = Departamento::create($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);

        return view('departamento.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);

        return view('departamento.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        request()->validate(Departamento::$rules);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento updated successfully');
    }

    // /**
    //  * @param int $id
    //  * @return \Illuminate\Http\RedirectResponse
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $departamento = Departamento::find($id)->delete();

    //     return redirect()->route('departamentos.index')
    //         ->with('success', 'Departamento deleted successfully');
    // }
}
