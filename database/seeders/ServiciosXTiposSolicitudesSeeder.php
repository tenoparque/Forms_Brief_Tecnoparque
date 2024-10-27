<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosXTiposSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios_por_tipos_de_solicitudes')->insert([
            [
                'nombre'=>'Pieza para Instagram y Facebook (1080 x 1080) px',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ]
        ]);
    }
}
