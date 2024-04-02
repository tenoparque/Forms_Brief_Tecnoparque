<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nodo;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as SpatieRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'celular' => $data ['celular'],
            'id_nodo' => $data['id_nodo'],
            'id_estado' => 1
        ]);

        $roleName = $data['role'];

        $role = SpatieRol::findByName($roleName, 'web');

        if ($role) {
            $user->assignRole($role);
        }

        // Aquí puedes agregar cualquier lógica adicional que necesites después de asignar el rol al usuario
        // Por ejemplo, enviar correos electrónicos, registrar eventos, etc.

        return $user;
    }

    protected function showRegistrationForm()
    {
        $nodos = Nodo::all(); 
        $roles = Role::all();

        return view('auth.register', ['nodos' => $nodos], ['roles' => $roles]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Verificar si el usuario autenticado es un SuperAdmin
        $superAdminRole = SpatieRol::where('name', 'SuperAdmin')->first();
        if ($superAdminRole && $user->hasRole($superAdminRole)) {
            return redirect()->route('register')->with('status', 'Usuario registrado correctamente.');
        }

        return redirect($this->redirectPath())->with('status', 'Usuario registrado correctamente.');
    }

    protected function registered(Request $request, $user)
    {
        // Sobrescribimos este método para evitar el inicio de sesión automático
        // Redirigimos al usuario a la página de inicio
        return redirect($this->redirectPath())->with('status', 'Usuario registrado correctamente.');
    }
}
