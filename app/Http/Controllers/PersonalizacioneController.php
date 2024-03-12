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
        $output = ""; // Variable de salida definida e inicializada
    
        // Buscamos el usuario por su correo electrónico
        $user = User::where('email', 'LIKE', '%' . $request->search . '%')->first();
    
        // Verificamos si se encontró un usuario con el correo electrónico proporcionado
        if ($user) {
            // Realizamos la consulta utilizando el ID del usuario
            $personalizaciones = Personalizacione::where('id_users', $user->id)->get();
    
            // Usamos un bucle foreach para iterar sobre los registros
            foreach ($personalizaciones as $personalizacion) {
                $output .= 
                '<tr>
                    <td>' . $personalizacion->id . '</td>
                    <td>' . $personalizacion->logo . '</td>
                    <td>' . $personalizacion->color_principal . '</td>
                    <td>' . $personalizacion->color_secundario . '</td>
                    <td>' . $personalizacion->color_terciario . '</td>
                    <td>' . $user->email . '</td>
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
        }
    
        return response($output); // Retornamos la respuesta enviando como parámetro la variable de salida
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

    $request->validate([
        'logo' => 'required|image|max:2048', // Validar que sea una imagen con un tamaño máximo de 2MB
    ]);

    // Validar los datos del formulario
    $request->validate(Personalizacione::$rules);

    // Comprobar si se ha enviado un archivo
    if ($request->hasFile('logo')) {
        // Obtener el contenido binario de la imagen
        $logoContenido = file_get_contents($request->file('logo')->getRealPath());

        // Crear una nueva instancia de Personalizacione
        $personalizacion = new Personalizacione();

        // Asignar los datos del formulario a la instancia
        $personalizacion->fill($request->all());

        // Asignar el contenido binario de la imagen a la propiedad "logo"
        $personalizacion->logo = $logoContenido;

        // Guardar la instancia en la base de datos
        $personalizacion->save();

        return redirect()->route('personalizaciones.index')->with('success', 'Personalizacion creada exitosamente.');
    }

        return back()->withInput()->with('error', 'Debe seleccionar una imagen.');
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
