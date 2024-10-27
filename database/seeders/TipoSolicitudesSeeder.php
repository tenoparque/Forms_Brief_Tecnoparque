<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_de_solicitudes')->insert([
            [
                'nombre' => 'Línea Gráfica',
                'id_estado' => '1'
            ],
            [
                'nombre'=>'Página Web',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Talento Tecnoparque',
                'id_estado'=>1
            ]
        ]);
    }
}
