<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialDeModificacionesPorSolicitude
 *
 * @property $id
 * @property $id_soli
 * @property $modificacion
 * @property $fecha_de_modificacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Solicitude $solicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialDeModificacionesPorSolicitude extends Model
{
    
    static $rules = [
		'id_soli' => 'required',
		'modificacion' => 'required',
		'fecha_de_modificacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_soli','modificacion','fecha_de_modificacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitude()
    {
        return $this->hasOne('App\Models\Solicitude', 'id', 'id_soli');
    }
    

}
