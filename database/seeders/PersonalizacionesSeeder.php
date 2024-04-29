<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personalizacione;


class PersonalizacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personalizacione::create([
            'logo' => 'public/images/recursos/elementos plataforma-05.png',
            'color_principal'=> '#39a900',
            'color_secundario'=> '#00324d',
            'color_terciario'=>'yelow',
            'id_users'=>1,
            'id_estado'=>1,
            'color_cuarto'=> '#a2c4c9'
    ]);
    }
}
