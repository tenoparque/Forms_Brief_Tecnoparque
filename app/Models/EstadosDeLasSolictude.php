<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosDeLasSolictude
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property HistorialDeEstadosPorSolicitude[] $historialDeEstadosPorSolicitudes
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadosDeLasSolictude extends Model
{
    
    static $rules = [
		'nombre' => 'required',
        'id_estado' => 'required',
        // 'orden_mostrado' => 'required', // Agrega las reglas de validación según lo necesites
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'id_estado', 'orden_mostrado']; // Agrega el nuevo campo al $fillable

    protected $casts = [
        'orden_mostrado' => 'integer', // O cambia el tipo de dato según sea necesario
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeEstadosPorSolicitudes()
    {
        return $this->hasMany('App\Models\HistorialDeEstadosPorSolicitude', 'id_estados_s', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes()
    {
        return $this->hasMany('App\Models\Solicitude', 'id_estado_de_la_solicitud', 'id');
    }
    

}
