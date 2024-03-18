<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialDeEstadosPorSolicitude
 *
 * @property $id
 * @property $id_estados_s
 * @property $id_solicitudes
 * @property $id_users
 * @property $fecha_de_cambio_de_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadosDeLasSolictude $estadosDeLasSolictude
 * @property Solicitude $solicitude
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialDeEstadosPorSolicitude extends Model
{
    
    static $rules = [
		'id_estados_s' => 'required',
		'id_solicitudes' => 'required',
		'id_users' => 'required',
		'fecha_de_cambio_de_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_estados_s','id_solicitudes','id_users','fecha_de_cambio_de_estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadosDeLasSolictude()
    {
        return $this->belongsTo(\App\Models\EstadosDeLasSolictude::class, 'id_estados_s', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitude()
    {
        return $this->belongsTo(\App\Models\Solicitude::class, 'id_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }
    

}
