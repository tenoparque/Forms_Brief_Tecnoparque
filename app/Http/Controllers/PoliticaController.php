<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Politica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class PoliticaController
 * @package App\Http\Controllers
 */
class PoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politicas = Politica::paginate();

        return view('politica.index', compact('politicas'))
            ->with('i', (request()->input('page', 1) - 1) * $politicas->perPage());
    }

    public function search(Request $request)
    {
        $output = ""; // Variable de salida definida e inicializada
    
        // Buscamos el usuario por su correo electrónico
        $user = User::where('email', 'LIKE', '%' . $request->search . '%')->first();
    
        // Verificamos si se encontró un usuario con el correo electrónico proporcionado
        if ($user) {
            // Realizamos la consulta utilizando el ID del usuario
            $politicas = Politica::where('id_usuario', $user->id)->get();
    
            // Usamos un bucle foreach para iterar sobre los registros
            foreach ($politicas as $politica) {
                $output .= 
                '<tr>
                    <td>' . $politica->id . '</td>
                    <td>' . $politica->link . '</td>
                    <td>' . $politica->descripcion . '</td>
                    <td>' . $politica->qr . '</td>
                    <td>' . $user->email . '</td>
                    <td>' . $politica->estado->nombre . '</td>
                    <td>' . $politica->titulo . '</td>

                    
                    <td>
                        <a href="' . url('/politicas/' . $politica->id) . '" class="btn btn-sm btn-primary">
                            <i class="fa fa-fw fa-eye"></i> Show
                        </a>
                        <a href="' . url('/politicas/' . $politica->id . '/edit') . '" class="btn btn-sm btn-success">
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
        $politica = new Politica();
        $usuarios = User::all();
        $estados = Estado::all();
        return view('politica.create', compact('politica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Obtener el ID del usuario autenticado
        $usuarioId = Auth::id();


        $request->merge([
            'id_usuario' => $usuarioId,
            'id_estado' => 1
        ]);

        $request->validate([
            'qr' => 'required|image|max:900', // Validar que sea una imagen con un tamaño máximo de 900KB
        ]);

        // Validar los datos del formulario
        $request->validate(Politica::$rules);

        if ($request->hasFile('qr')) {
            // Obtener el contenido binario de la imagen
            $qrContenido = file_get_contents($request->file('qr')->getRealPath());

            // Crear una nueva instancia de la clase Politica
            $politica = new Politica();

            // Asignar otros datos a la instancia de Politica
            $politica->fill($request->all());

            // Asignar el contenido binario de la imagen al campo 'qr'
            $politica->qr = $qrContenido;

            // Guardar la instancia de Politica en la base de datos
            $politica->save();

            return redirect()->route('politicas.index')->with('success', 'Política creada exitosamente.');
        }

        // Si no se cargó ningún archivo, volver atrás con un mensaje de error
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
        $politica = Politica::find($id);

        return view('politica.show', compact('politica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $politica = Politica::find($id);
        $usuarios = User::all();
        $estados = Estado::all();

        return view('politica.edit', compact('politica', 'usuarios', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Politica $politica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Politica $politica)
    {
        // Obtener el ID del usuario autenticado
        $usuarioId = Auth::id();

        $request->merge([
            'id_usuario' => $usuarioId,
        ]);

        $request->validate([
            'qr' => 'image', 
        ]);

        if ($request->hasFile('qr')) {
            // Obtener el contenido binario de la nueva imagen
            $qrContent = file_get_contents($request->file('qr')->getRealPath());

            // Actualizar el campo de imagen 'qr' con el nuevo contenido
            $politica->qr = $qrContent;
        }

        // Actualizar los demás campos excepto 'qr'
        $politica->update($request->except('qr'));

        return redirect()->route('politicas.index')
            ->with('success', 'Politica updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    // public function destroy($id)
    // {
    //     $politica = Politica::find($id)->delete();

    //     return redirect()->route('politicas.index')
    //         ->with('success', 'Politica deleted successfully');
    // }
}
