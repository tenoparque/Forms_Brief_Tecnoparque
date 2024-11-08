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
                'id_ciudad' => 904,  // ID de la ciudad correspondiente
            ],
            [
                'nombre' => 'Nodo Atlantico',
                'id_estado' => 1,
                'id_ciudad' => 136
            ],
            [
                'nombre' => 'Nodo Valledupar',
                'id_estado' => 1,
                'id_ciudad' => 456
            ],
            [
                'nombre' => 'Nodo Ocaña',
                'id_estado' => 1,
                'id_ciudad' => 839
            ],
            [
                'nombre' => 'Nodo Bolivar',
                'id_estado' => 1,
                'id_ciudad' => 872
            ],
            [
                'nombre' => 'Nodo Cúcuta',
                'id_estado' => 1,
                'id_ciudad' => 824
            ],
            [
                'nombre' => 'Nodo Socorro',
                'id_estado' => 1,
                'id_ciudad' => 925
            ],
            [
                'nombre' => 'Nodo Medellín',
                'id_estado' => 1,
                'id_ciudad' => 73
            ],
            [
                'nombre' => 'Nodo Arauca',
                'id_estado' => 1,
                'id_ciudad' => 128
            ],
            [
                'nombre' => 'Nodo Rionegro',
                'id_estado' => 1,
                'id_ciudad' => 87
            ],
            [
                'nombre' => 'Nodo Caldas',
                'id_estado' => 1,
                'id_ciudad' => 336
            ],
            [
                'nombre' => 'Nodo Risaralda',
                'id_estado' => 1,
                'id_ciudad' => 889
            ],
            [
                'nombre' => 'Nodo Bogotá DC',
                'id_estado' => 1,
                'id_ciudad' => 495
            ],
            [
                'nombre' => 'Nodo Rural Quindío',
                'id_estado' => 1,
                'id_ciudad' => 870
            ],
            [
                'nombre' => 'Nodo Cundinamarca',
                'id_estado' => 1,
                'id_ciudad' => 603
            ],
            [
                'nombre' => 'Nodo Tolima',
                'id_estado' => 1,
                'id_ciudad' => 1023
            ],
            [
                'nombre' => 'Nodo Valle',
                'id_estado' => 1,
                'id_ciudad' => 1065
            ],
            [
                'nombre' => 'Nodo Neiva',
                'id_estado' => 1,
                'id_ciudad' => 658
            ],
            [
                'nombre' => 'Nodo Cauca',
                'id_estado' => 1,
                'id_ciudad' => 416
            ],
            [
                'nombre' => 'Nodo Angostora',
                'id_estado' => 1,
                'id_ciudad' => 658
            ],
            [
                'nombre' => 'Nodo Pitalito',
                'id_estado' => 1,
                'id_ciudad' => 663
            ],
        ]);
    }
}
