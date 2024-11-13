<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('politicas')->insert([
            [
                'titulo'=>'Autorización para utilización de material audiovisual',
                'descripcion'=>'Autorizo al Servicio Nacional de Aprendizaje SENA para que mi testimonio, fotos y creaciones audiovisuales, grabados libre y espontáneamente, sean utilizados, reutilizados de forma vitalicia, editados, en cualquier formato existente o por existir y emitidos por cualquier medio, puesta a disposición o soporte, en cualquier tiempo y lugar de Colombia, el exterior o territorio universal; para promoción y divulgación de los servicios misionales y gestión de la Entidad. 
                Derechos de imagen y derechos de autor (comunicación pública, radiodifusión, sincronización y fijación) de la Entidad o a la persona que esta autorice.
                Así mismo, manifiesto conocer que la producción audiovisual realizada por el Servicio Nacional de Aprendizaje SENA es para ser empleada en espacios educativos, culturales, didácticos o de carácter institucional y no tiene fines publicitarios, comerciales, ni económicos. Además, mantendré indemne al Servicio Nacional de Aprendizaje SENA, frente a todo reclamo, demanda y responsabilidad alguna con relación al uso del material mencionado anteriormente por término indefinido. 
                Del mismo modo, reconozco y acepto que el Servicio Nacional de Aprendizaje SENA, no asume ninguna responsabilidad por grabaciones o publicaciones que puedan ser efectuadas por terceros invitados al evento o por personal de medios de comunicación.',
                'id_estado'=>1,
                'id_usuario'=>1
            ]
        ]);
    }
}
