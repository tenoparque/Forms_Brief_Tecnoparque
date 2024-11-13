<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreoCredenciales;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Generar una contraseña aleatoria
        $password = \Str::random(8);

        Log::info('Procesando fila de usuario:', $row);

        try {
            // Crear el usuario sin asignar el rol todavía
            $user = new User([
                'name' => $row['name'],
                'apellidos' => $row['apellidos'],
                'email' => $row['email'],
                'password' => Hash::make($password),
                'celular' => $row['celular'],
                'id_nodo' => $row['id_nodo'],
                'id_estado' => $row['id_estado'],
            ]);

            // Guardar el usuario para que tenga un ID asignado
            $user->save();

            // Asignar el rol al usuario después de crear el usuario
            if (!empty($row['role'])) {
                $user->assignRole($row['role']); // Usa el método de Spatie para asignar roles
            }

            // Enviar el correo con las credenciales
            Mail::to($user->email)->send(new EnviarCorreoCredenciales($user, $password));

            return $user;
        } catch (\Exception $e) {
            Log::error('Error al crear el usuario: ' . $e->getMessage());
            return null;
        }
    }
}