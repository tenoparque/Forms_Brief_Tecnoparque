<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosUnicoXSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('datos_unicos_por_solicitudes')->insert([
            [
                'nombre'=>'Dimensiones o datos claves',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Titulo de pieza gráfica o evento',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>2,
                'id_estados'=>1
            ]
        ]);
    }
}
