<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\PolicyAcceptance;
use App\Models\Politica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
                    <td data-titulo="No">' . $politica->id . '</td>
                    <td data-titulo="Descripcion">' . $politica->descripcion . '</td>
                    <td data-titulo="Email Usuario">' . $user->email . '</td>
                    <td data-titulo="Estado">' . $politica->estado->nombre . '</td>
                    <td data-titulo="Politica titulo">' . $politica->titulo . '</td>
                    
                    <td>
                        <a href="' . url('/politicas/' . $politica->id) . '" class="btnDetalle">
                            <i class="fa fa-fw fa-eye iconDCR"></i> Detalle
                        </a>
                        <a href="' . url('/politicas/' . $politica->id . '/edit') . '" class="btnEdit">
                            <i class="fa fa-fw fa-edit iconEdit"></i> Editar
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

        Log::info('Datos enviados a la vista de creación de política:', [
            'politica' => $politica,
            'usuarios' => $usuarios->toArray(),
            'estados' => $estados->toArray(),
        ]);
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

        // $request->validate([
        //     'qr' => 'required|image|max:900', // Validar que sea una imagen con un tamaño máximo de 900KB
        // ]);

        // Validar los datos del formulario
        $request->validate(Politica::$rules);

        // Crear una nueva instancia de la clase Politica
        $politica = new Politica();

        // Asignar otros datos a la instancia de Politica
        $politica->fill($request->all());

        // Guardar la instancia de Politica en la base de datos
        $politica->save();

        return redirect()->route('politicas.index')->with('success', 'Política Creada Exitosamente.');
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
            'qr' => 'image|max:900', // Validar que sea una imagen con un tamaño máximo de 900KB
        ]);

        // Validar los datos del formulario
        $request->validate(Politica::$rules);

        if ($request->hasFile('qr')) {
            // Obtener el contenido binario de la nueva imagen
            $qrContent = file_get_contents($request->file('qr')->getRealPath());

            // Actualizar el campo de imagen 'qr' con el nuevo contenido
            $politica->qr = $qrContent;
        }

        // Actualizar los demás campos excepto 'qr'
        $politica->update($request->except('qr'));

        return redirect()->route('politicas.index')
            ->with('success', 'Politica Actualizada Exitosamente');
    }


    public function acceptPolicy(Request $request, $policyId)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Usuario no autenticado.'], 401);
            }

            // Crear el registro de aceptación en la base de datos
            PolicyAcceptance::create([
                'user_id' => $user->id,
                'policy_id' => $policyId,
                'accepted_at' => now(),
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Registrar el error en los logs
            Log::error('Error en acceptPolicy: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error interno en el servidor.'], 500);
        }
    }
}
