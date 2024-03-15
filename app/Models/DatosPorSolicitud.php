<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosPorSolicitud
 *
 * @property $id
 * @property $id_solicitudes
 * @property $id_datos_unicos_por_solicitudes
 * @property $dato
 * @property $created_at
 * @property $updated_at
 *
 * @property DatosUnicosPorSolicitude $datosUnicosPorSolicitude
 * @property Solicitude $solicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DatosPorSolicitud extends Model
{
    protected $table = 'datos_por_solicitud'; // Nombre de la tabla
    
    static $rules = [
		'id_solicitudes' => 'required',
		'id_datos_unicos_por_solicitudes' => 'required',
		'dato' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_solicitudes','id_datos_unicos_por_solicitudes','dato'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function datosUnicosPorSolicitude()
    {
        return $this->hasOne('App\Models\DatosUnicosPorSolicitude', 'id', 'id_datos_unicos_por_solicitudes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitude()
    {
        return $this->hasOne('App\Models\Solicitude', 'id', 'id_solicitudes');
    }
    

}
