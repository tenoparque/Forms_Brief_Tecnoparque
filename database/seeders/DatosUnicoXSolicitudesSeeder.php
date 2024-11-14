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
                'descripcion'=>'Centímetros (cm) o  Pixeles (Px). tomando el primer valor como altura y segundo valor como ancho.',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Titulo de pieza gráfica o evento',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Fecha del evento',
                'descripcion'=>'Indicar fecha que debe llevar la pieza o producto.',
                'id_tipos_de_datos'=>4,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Hora del evento',
                'descripcion'=>'Indicar Hora que debe llevar la pieza o producto.',
                'id_tipos_de_datos'=>5,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Texto que desea que tenga la pieza',
                'descripcion'=>'Cifras, Datos, Participantes, Indicadores, Valores, Medio de transmisión. Esta información es muy importante para el desarrollo de la pieza grafica.',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Entidades que organizan y apoyan',
                'descripcion'=>'Nombres de las entidades que organizan, agrega logos en la opción del link de driver en orden lógico imágenes png o pdf',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Observaciones generales',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>1,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Observaciones generales',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>2,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Nombre Del Producto',
                'descripcion'=>'Razón Social (nombre temporal o sigla)',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Descripción del proyecto ',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Grupo Objetivo',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Cubrimiento y alcance que tiene el proyecto',
                'descripcion'=>'Local, Regional, Nacional, Internacional',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Tamaño de la empresa',
                'descripcion'=>'Grande, Mediana, Micro-empresa',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Texto que desea que tenga la publicación',
                'descripcion'=>'Cifras, Datos, Participantes, Indicadores, Valores, Medio de transmisión. Esta información es muy importante para el desarrollo de la pieza grafica.',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
            [
                'nombre'=>'Observaciones generales',
                'descripcion'=>'',
                'id_tipos_de_datos'=>1,
                'id_tipos_de_solicitudes'=>3,
                'id_estados'=>1
            ],
        ]);
    }

    
}
