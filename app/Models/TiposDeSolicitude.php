<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposDeSolicitude
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property DatosUnicosPorSolicitude[] $datosUnicosPorSolicitudes
 * @property Estado $estado
 * @property ServiciosPorTiposDeSolicitude[] $serviciosPorTiposDeSolicitudes
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposDeSolicitude extends Model
{
    
    static $rules = [
		'nombre' => 'required',
        'id_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosUnicosPorSolicitudes()
    {
        return $this->hasMany('App\Models\DatosUnicosPorSolicitude', 'id_tipos_de_solicitudes', 'id');
    }
    
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
    public function serviciosPorTiposDeSolicitudes()
    {
        return $this->hasMany('App\Models\ServiciosPorTiposDeSolicitude', 'id_tipo_de_solicitud', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes()
    {
        return $this->hasMany('App\Models\Solicitude', 'id_tipos_de_solicitudes', 'id');
    }
    

}
