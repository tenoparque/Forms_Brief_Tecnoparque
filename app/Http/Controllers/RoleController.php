<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $roles = Role::paginate(10);

        return view('role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    public function search(Request $request)
    {
        $output= ""; // The output variable is defined and initialized
        $roles = Role::where('name', 'LIKE', '%'.$request -> search.'%')->get(); // We make the query through the Rol name

        // We use the loop foreach to iterate the aggregation of records
        foreach($roles as $rol){
            $output .= 
            '<tr>
                <td data-titulo="No">' . $rol->id . '</td>
                <td data-titulo="Nombre Rol">' . $rol->name . '</td>
                <td>
                    <a href="' . url('/roles/' . $rol->id) . '" class="btn btn-outline"
                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                    Detalle
                    </a>
                    <a href="' . url('/roles/' . $rol->id . '/edit') . '" class="btn btn-outline"
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
        $role = new Role();
        return view('role.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['guard_name' => 'web']); // Set the default guard_name to 'web'.

        request()->validate(Role::$rules);

        $role = Role::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->merge(['guard_name' => 'web']); // Set the default guard_name to 'web'.

        request()->validate(Role::$rules);

        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol Actualizado Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol Eliminado Exitosamente');
    }
}
