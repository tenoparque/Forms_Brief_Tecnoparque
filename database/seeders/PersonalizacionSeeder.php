<?php

namespace Database\Seeders;

use App\Models\Personalizacione;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Encuentra el primer usuario en la base de datos
        $user = User::first();

        // Verifica si hay un usuario disponible
        if ($user) {
            // Ruta de la imagen en la carpeta public
            $pathToImage = public_path('images/recursos/elementos plataforma-05.png');

            // Lee el archivo de la imagen
            $imageData = file_get_contents($pathToImage);

            // Crea una nueva personalización con la imagen en formato binario (sin codificar en base64 aquí)
            Personalizacione::create([
                'id_users' => $user->id,
                'logo' => $imageData, // Aquí guarda el archivo binario
                'color_principal' => '#39a900',
                'color_secundario' => '#00324d',
                'color_terciario' => 'yellow',
                'color_cuarto' => '#642c78',
                'id_estado' => 1,
            ]);
        } else {
            $this->command->info('No se encontró ningún usuario para asociar la personalización.');
        }
    }
}
