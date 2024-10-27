<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Nodo;
use App\Models\Estado;
use App\Models\Role;
use Spatie\Permission\Models\Role as SpatieRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $users = User::with('nodo', 'estado')->paginate(10);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function miperfil()
    {
        $user = Auth::user();
        $estados = Estado::all();
        $nodos = Nodo::all();
        $roles = SpatieRole::pluck('name', 'id');

        return view('user.miperfil', compact('user', 'estados', 'nodos', 'roles'));
    }

    public function search(Request $request)
    {
        $num = 0;
        $output = ""; // The output variable is defined and initialized

        $users = User::with('roles')
            ->where('email', 'LIKE', '%' . $request->search . '%') // We make the query through the Nodo name
            ->get();

        // We use the loop foreach to iterate the aggregation of records
        foreach ($users as $user) {
            $output .=
                '<tr>
                <td data-titulo="No">' . ++$num . '</td>
                <td data-titulo="Nombre">' . $user->name . '</td>
                <td data-titulo="Apellidos">' . $user->apellidos . '</td>
                <td data-titulo="Email">' . $user->email . '</td>
                <td data-titulo="Celular">' . $user->celular . '</td>
                <td data-titulo="Nombre Nodo">' . $user->nodo->nombre . '</td>
                <td data-titulo="Estado">' . $user->estado->nombre . '</td>
                <td data-titulo="">';

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
                                    style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                                    onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                                    onmouseout="this.style.backgroundColor=\'#FFFF\';">
                                    <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                                    Detalle
                                </a>
        
                                <a href="' . route('users.edit', $user->id) . '" class="btn btn-outline"
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
        $user = new User();
        $nodos = Nodo::all();
        $estados = Estado::all();
        return view('user.create', compact('user', 'nodos', 'estados'));
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
            ->with('success', 'Usuario Creado Exitosamente');
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
        return view('user.edit', compact('user', 'nodos', 'estados', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validar la solicitud
        request()->validate(User::$rules);

        // Verificar si el estado del usuario cambiará a inactivo
        $estadoAnterior = $user->id_estado;  // Estado antes de actualizar
        $estadoNuevo = $request->input('id_estado');  // Estado que se está enviando

        // Actualizar los datos del usuario
        $user->update($request->all());

        // Si el estado del usuario cambia a inactivo (id_estado = 2)
        if ($estadoNuevo == 2 && $estadoAnterior != 2) {
            // Cerrar sesión si el usuario está autenticado
            if (Auth::id() == $user->id) {
                Auth::logout();
                // Redireccionar al login después de cerrar la sesión
                return redirect()->route('login')->with('success', 'Usuario desactivado y sesión cerrada.');
            }
        }

        // Redirigir a la lista de usuarios si no es el usuario actual
        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado con éxito.');
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
            ->with('success', 'Usuario Eliminado Exitosamente');
    }
}
