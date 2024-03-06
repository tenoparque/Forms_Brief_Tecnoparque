<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiciosPorTiposDeSolicitude
 *
 * @property $id
 * @property $nombre
 * @property $id_tipo_de_solicitud
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property ElementosPorSolicitude[] $elementosPorSolicitudes
 * @property Estado $estado
 * @property TiposDeSolicitude $tiposDeSolicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiciosPorTiposDeSolicitude extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_tipo_de_solicitud' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_tipo_de_solicitud','id_estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elementosPorSolicitudes()
    {
        return $this->hasMany('App\Models\ElementosPorSolicitude', 'id_subservicios', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposDeSolicitude()
    {
        return $this->hasOne('App\Models\TiposDeSolicitude', 'id', 'id_tipo_de_solicitud');
    }
    

}
