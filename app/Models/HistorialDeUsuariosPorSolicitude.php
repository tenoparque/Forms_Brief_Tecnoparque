<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialDeUsuariosPorSolicitude
 *
 * @property $id
 * @property $id_solicitudes
 * @property $id_users
 * @property $fecha_asignación
 * @property $id_estados
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Solicitude $solicitude
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialDeUsuariosPorSolicitude extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_solicitudes', 'id_users', 'fecha_asignación', 'id_estados'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'id_estados', 'id');
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
