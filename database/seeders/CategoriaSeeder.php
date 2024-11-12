<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias_eventos_especiales')->insert([
            [
                'nombre'=>'Impulso de la economia popular',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Campesena',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Convergencia regional',
                'id_estado' =>1
            ],
            [
                'nombre'=>'Producción para la vida',
                'id_estado'=>1
            ]
        ]);
    }
}
