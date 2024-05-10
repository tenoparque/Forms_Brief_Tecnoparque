<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\EstadosDeLasSolictude;



class EstadosDeLasSolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        EstadosDeLasSolictude::create(['nombre' => 'PENDIENTE' , 'id_estado' => 1,'orden_mostrado' =>1]);
        EstadosDeLasSolictude::create(['nombre' => 'ASIGNADO','id_estado' => 1,'orden_mostrado' =>2]);
        EstadosDeLasSolictude::create(['nombre' => 'EN PROCESO','id_estado' => 1,'orden_mostrado' =>3]);
        EstadosDeLasSolictude::create(['nombre' => 'AJUSTES','id_estado' => 1,'orden_mostrado' =>4]);
        EstadosDeLasSolictude::create(['nombre' => 'FINALIZADO','id_estado' => 1,'orden_mostrado' =>5]);



    }
}
