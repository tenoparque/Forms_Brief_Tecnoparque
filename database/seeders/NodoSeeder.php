<?php

namespace Database\Seeders;

use App\Models\Nodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nodos')->insert([
            [
                'nombre' => 'Nodo Bucaramanga',
                'id_estado' => 1,  // ID del estado correspondiente
                'id_ciudad' => 1,  // ID de la ciudad correspondiente
            ],
        ]);
    }
}
