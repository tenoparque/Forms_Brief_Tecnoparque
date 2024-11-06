<?php

namespace Database\Seeders;

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
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Pieza para estados Whatsapp (1080 x 1920) px',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Pieza para historias en redes sociales (750 x 1334) px',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Banner para web (1024x769) px',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Piezas para correo (320 x 550) px',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Pendón (determinar tamaño)',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Afiche (determinar tamaño)',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Infografía (determinar tamaño)',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Agregar noticia al micrositio del nodo',
                'id_tipo_de_solicitud'=>1,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Agregar evento al micrositio del nodo',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Cambiar imagen o video Banner Principal nodo',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Agregar aliado estrategico del nodo',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Cambiar informacion canales de información',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Cambiar información lineas tecnologicas',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Cambiar informacion de sub-lineas tecnologicas',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Crear modulo especial para evento especializado del nodo.',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Otra',
                'id_tipo_de_solicitud'=>2,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Diseño de marca',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Diseño de Identidad Corporativa',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Etiqueta',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Diseño de empaque',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Diseño de la ficha Técnica de producto',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Edición fotográfica',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
            [
                'nombre'=>'Otra',
                'id_tipo_de_solicitud'=>3,
                'id_estado'=>1
            ],
        ]);
    }
}
