<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_de_datos')->insert([
            [
                'nombre'=>'Texto',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Número',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Link',
                'id_estado'=>1
            ],
            [
                'nombre'=>'Fecha',
                'id_estado'=>1
            ]
        ]);
    }
}
