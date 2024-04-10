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
                $logoBase64 = base64_encode($personalizacion->logo);
                $output .= 
                '<tr>
                    <td data-titulo="No">' . $personalizacion->id . '</td>
                    <td data-titulo="Img Logo"><img style="display: flex"  src="data:image/png;base64,' . $logoBase64 . '" alt="LOGO" class="ImgCeldaPesonalizacion"></td>
                    <td data-titulo="Color Principal"> ' . $personalizacion->color_principal . '</td>
                    <td data-titulo="Color Segundario">' . $personalizacion->color_secundario . '</td>
                    <td data-titulo="Color Terciario">' . $personalizacion->color_terciario . '</td>
                    <td data-titulo="Email Usuario">' . $user->email . '</td>
                    <td data-titulo="Estado">' . $personalizacion->estado->nombre . '</td>
                    
                    <td>
                        <a href="' . url('/personalizaciones/' . $personalizacion->id) . '" class="btn btn-outline"
                        style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                        onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                        onmouseout="this.style.backgroundColor=\'#FFFF\';">
                        <i class="fa fa-eye fa-xs" style="color: #642c78; margin-left: 5px;"></i>
                        Detalle
                        </a>
                        <a href="' . url('/personalizaciones/' . $personalizacion->id . '/edit') . '" class="btn btn-outline"
                        style="color:#00324D; background-color: #ffff; border:2px solid #82DEF0; height: 40px; width:100px; cursor: pointer; border-radius: 35px; justify-content: center; justify-items: center; position: relative;"
                        onmouseover="this.style.backgroundColor=\'#b2ebf2\';"
                        onmouseout="this.style.backgroundColor=\'#FFFF\';">
                        <i class="fa fa-pen-to-square fa-xs" style="color: #39a900;"></i>
                        Editar
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
    
    // public function create()
    // {
    //     $personalizacione = new Personalizacione();
    //     $estados = Estado::all();
    //     return view('personalizacione.create', compact('personalizacione'));
    // }

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
        'logo' => 'required|image|max:900', // Validar que sea una imagen con un tamaño máximo de 900KB
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

        return redirect()->route('personalizaciones.index')->with('success', 'Personalizacion Creada Exitosamente.');
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

         // Validar la nueva imagen
        $request->validate([
        'logo' => 'image|max:900', // Validar que sea una imagen con un tamaño máximo de 900KB
        ]);

       // Validar los datos del formulario
        $request->validate(Personalizacione::$rules);

        // Comprobar si se ha enviado una nueva imagen
        if ($request->hasFile('logo')) {

            // Obtener el contenido binario de la nueva imagen
            $logoContenido = file_get_contents($request->file('logo')->getRealPath());

            // Actualizar el campo "logo" con el nuevo contenido binario
            $personalizacione->logo = $logoContenido;
        }

        // Actualizar los demás campos
        $personalizacione->update($request->except('logo'));

        return redirect()->route('personalizaciones.index')
            ->with('success', 'Personalizacion Actualizada Exitosamente ');
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
