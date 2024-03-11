<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Nodo;
use App\Models\Estado;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('nodo','estado')->paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function search(Request $request)
    {
        $num = 0;
        $output= ""; // The output variable is defined and initialized
        
        $users = User::with('roles')
                ->where('email', 'LIKE', '%'.$request->search.'%') // We make the query through the Nodo name
                ->get();

        // We use the loop foreach to iterate the aggregation of records
        foreach ($users as $user) {
            $output .= 
            '<tr>
                <td>' . ++$num . '</td>
                <td>' . $user->name . '</td>
                <td>' . $user->email . '</td>
                <td>' . $user->celular . '</td>
                <td>' . $user->apellidos . '</td>
                <td>' . $user->nodo->nombre . '</td>
                <td>' . $user->estado->nombre . '</td>
                <td>';

            $lastRoleIndex = count($user->roles) - 1;
            foreach ($user->roles as $index => $role) {
                $output .= $role->name;
                if ($index !== $lastRoleIndex) {
                    $output .= '<br>';
                }
            }
        
            $output .= '</td>
                            <td>
                                <a href="' . route('users.show', $user->id) . '" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                                    Detalle
                                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                </a>
        
                                <a href="' . route('users.edit', $user->id) . '" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                                    Editar
                                    <i class="fa fa-pen-to-square fa-xs" style="color: #39a900;"></i>
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
        $user = new User();
        $nodos = Nodo::all();
        $estados = Estado::all();
        return view('user.create', compact('user' , 'nodos', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $nodos = Nodo::all();
        $estados = Estado::all();
        $roles = SpatieRole::pluck('name', 'id');
        return view('user.edit', compact('user' , 'nodos' , 'estados', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     request()->validate(User::$rules);

    //     $user->update($request->all());

    //     return redirect()->route('users.index')
    //         ->with('success', 'User updated successfully');
    // }


    public function update(Request $request, User $user)
{
    request()->validate(User::$rules);

    $user->update($request->all());

    // Obtener el nombre del rol del request
    $roleName = $request->role;

    // Buscar el rol por su nombre
    $role = SpatieRole::findByName($roleName, 'web');

    // Verificar si se encontró el rol
    if ($role) {
        // Asignar el rol al usuario
        $user->syncRoles([$role->name]); // Esto puede depender de cómo estés gestionando tus roles con Spatie
    }

    return redirect()->route('users.index')
        ->with('success', 'User updated successfully');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
