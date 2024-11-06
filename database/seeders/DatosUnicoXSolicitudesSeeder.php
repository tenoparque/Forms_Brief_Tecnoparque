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
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Fecha del evento',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Hora del evento',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Texto que desea que tenga la pieza',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Observaciones generales',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>2,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Nombre Del Producto',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Descripción del proyecto ',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Grupo Objetivo',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Cubrimiento y alcance que tiene el proyecto(Local, Regional, Nacional, Internacional)',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Tamaño de la empresa(Grande, Mediana, Micro-empresa)',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
        ]);
    }
}
