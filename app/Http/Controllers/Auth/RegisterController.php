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

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('guest');
=======
        //$this->middleware('auth');
        $this->middleware('guest');

>>>>>>> 1d460f9ee980e018503f8fa09a62d2119779b61b
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'], // Obtaining the name value provided through the name attribute
            'apellidos' => $data['apellidos'], // Obtaining the apellidos value provided through the name attribute
            'email' => $data['email'], // Obtaining the email value provided through the name attribute
            'password' => Hash::make($data['password']), // Getting the value of the password through the name attribute and hashed at the same time
            'celular' => $data ['celular'], // Obtaining the celular value provided through the name attribute
            'id_nodo' => $data['id_nodo'], // Obtaining the id_nodo value provided through the name attribute
            'id_estado' => 1 // Assigned the default active value
        ]);

        $roleName = $data['role']; // Getting the value of the selected role through the attribute name

        $role = SpatieRol::findByName($roleName, 'web'); // Obtaining the value of the selected role through the name attribute and saving it as a Spatie Role object. 

        // Checking if the role is found
        if ($role) {
            // If the role is found it is assigned to the user
            $user->assignRole($role);
        }

        return $user;
    }

    /**
     *  Crea
     */
    protected function showRegistrationForm()
    {
        $nodos = Nodo::all(); // Obtener todos los nodos
        $roles = Role::all();

        return view('auth.register', ['nodos' => $nodos], ['roles' => $roles]); // Pasar los nodos a la vista de registro
    }
}
