<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\TiposDeDato;


class TiposDeDatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposDeDato::create(['nombre' => 'Texto', 'id_estado' =>1 ]);
        TiposDeDato::create(['nombre' => 'Numero', 'id_estado' =>1]);
        TiposDeDato::create(['nombre' => 'Link', 'id_estado' =>1]);
        TiposDeDato::create(['nombre' => 'Fecha', 'id_estado' =>1]);
    }
}
