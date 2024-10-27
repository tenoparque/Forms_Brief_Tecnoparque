<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados_de_las_solictudes')->insert([
            [
                'nombre'=>'PENDIENTE',
                'id_estado'=>1,
                'orden_mostrado'=>1
            ],
            [
                'nombre'=>'ASIGNADO',
                'id_estado'=>1,
                'orden_mostrado'=>2
            ],
            [
                'nombre'=>'EN PROCESO',
                'id_estado'=>1,
                'orden_mostrado'=>3
            ],
            [
                'nombre'=>'AJUSTES',
                'id_estado'=>1,
                'orden_mostrado'=>4
            ],
            [
                'nombre'=>'FINALIZADO',
                'id_estado'=>1,
                'orden_mostrado'=>5
            ]
        ]);
    }
}
