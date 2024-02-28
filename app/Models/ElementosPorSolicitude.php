<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ElementosPorSolicitude
 *
 * @property $id
 * @property $id_solicitudes
 * @property $id_subservicios
 * @property $created_at
 * @property $updated_at
 *
 * @property ServiciosPorTiposDeSolicitude $serviciosPorTiposDeSolicitude
 * @property Solicitude $solicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ElementosPorSolicitude extends Model
{
    
    static $rules = [
		'id_solicitudes' => 'required',
		'id_subservicios' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_solicitudes','id_subservicios'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviciosPorTiposDeSolicitude()
    {
        return $this->hasOne('App\Models\ServiciosPorTiposDeSolicitude', 'id', 'id_subservicios');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitude()
    {
        return $this->hasOne('App\Models\Solicitude', 'id', 'id_solicitudes');
    }
    

}
