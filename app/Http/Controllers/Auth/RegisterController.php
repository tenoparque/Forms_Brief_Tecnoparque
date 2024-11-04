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
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreoCredenciales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/users';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Generar una contraseña aleatoria
        $password = $this->generateRandomPassword();

        $user = User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'celular' => $data ['celular'],
            'id_nodo' => $data['id_nodo'],
            'id_estado' => 1
        ]);

        $roleName = $data['role'];

        $role = SpatieRol::findByName($roleName, 'web');

        if ($role) {
            $user->assignRole($role);
        }

        // Envía las credenciales por correo electrónico al usuario
        Mail::to($user->email)->send(new EnviarCorreoCredenciales($user, $password));

        session()->flash('success', 'Usuario creado exitosamente. Revise su correo para las credenciales de acceso.');
        return $user;
    }

    protected function showRegistrationForm()
    {
        $nodos = Nodo::where('id_estado', '1')->get();
        
        $usuarioAutenticado = Auth::user();
       // Verificar si el usuario autenticado es un super admin
    if ($usuarioAutenticado->hasRole('Super Admin')) {
        // Si el usuario es un super admin, obtener todos los roles
        $roles = Role::all();
    } else {
        // Si el usuario no es un super admin, obtener todos los roles excepto el de "super admin"
        $roles = Role::where('name', '<>', 'super admin')->get();
    }
    return view('auth.register', compact('nodos', 'roles'));
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
        return redirect($this->redirectPath())->with('status', 'Usuario registrado correctamente.');
    }

    // Función para generar una contraseña aleatoria
    private function generateRandomPassword($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}
