<?php

namespace App\Imports;

use App\Models\Solicitude;
use App\Models\ElementosPorSolicitude;
use App\Models\DatosPorSolicitud;
use App\Models\EstadosDeLasSolictude;
use App\Models\TiposDeDato;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SolicitudesImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        Log::info('Datos de la fila:', $row);

            if (empty($row['id_tipos_de_solicitudes']) || empty($row['drive_link']) || empty($row['id_usuario_que_realiza_la_solicitud']) || empty($row['id_categorias_eventos_especiales']) || empty($row['id_estado_de_la_solicitud'])) {
            Log::error('Faltan datos requeridos en la fila: ', $row);
            return null; // Omite esta fila si faltan datos
        }
        

        $fechaHora = is_numeric($row['fecha_y_hora_de_la_solicitud'])
            ? Carbon::createFromFormat('Y-m-d', '1899-12-30')->addDays($row['fecha_y_hora_de_la_solicitud'])
            : Carbon::parse($row['fecha_y_hora_de_la_solicitud']);

        // Crear la solicitud principal
        $solicitude = Solicitude::create([
            'id_tipos_de_solicitudes' => $row['id_tipos_de_solicitudes'],
            'drive_link' => $row['drive_link'],
            'id_usuario_que_realiza_la_solicitud' => $row['id_usuario_que_realiza_la_solicitud'],
            'id_categorias_eventos_especiales' => $row['id_categorias_eventos_especiales'],
            'id_estado_de_la_solicitud' => $row['id_estado_de_la_solicitud'],
            'fecha_y_hora_de_la_solicitud' => $fechaHora,
        ]);

        Log::info("Solicitud creada con ID: " . $solicitude->id);

        // Insertar los servicios asociados a la solicitud (ElementosPorSolicitude)
        $serviciosSeleccionados = explode(',', $row['servicios']); // Asegúrate de que 'servicios' es una columna en el Excel que tenga IDs separados por comas
        foreach ($serviciosSeleccionados as $servicioId) {
            ElementosPorSolicitude::create([
                'id_solicitudes' => $solicitude->id,
                'id_subservicios' => $servicioId,
                // Si tienes un campo para otro_servicio en el Excel, lo puedes añadir aquí
            ]);
            Log::info("Servicio agregado a la solicitud: " . $servicioId);
        }

        // Insertar los datos únicos por solicitud (DatosPorSolicitud)
        $datosUnicos = [
            'dimensiones' => 1,
            'titulo_pieza' => 2,
            'fecha_evento' => 3,
            'hora_evento' => 4,
            'texto_pieza' => 5,
            'observaciones_generales' => 6, // ID del dato único correspondiente en la tabla 'datos_unicos_por_solicitudes'
            'nombre_del_producto' => 7,
            'descripcion_del_proyecto' => 8,
            'grupo_objetivo' => 9,
            'cubrimiento_y_alcance' => 10,
            'tamano_de_la_empresa' => 11,
        ];

        foreach ($datosUnicos as $columnaExcel => $idDatoUnico) {
            if (isset($row[$columnaExcel])) {
                DatosPorSolicitud::create([
                    'id_solicitudes' => $solicitude->id,
                    'id_datos_unicos_por_solicitudes' => $idDatoUnico,
                    'dato' => $row[$columnaExcel],
                ]);
            }
        }

        return $solicitude;
    }
}
