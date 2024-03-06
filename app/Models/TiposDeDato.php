<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposDeDato
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property DatosUnicosPorSolicitude[] $datosUnicosPorSolicitudes
 * @property Estado $estado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposDeDato extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		
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
        return $this->hasMany('App\Models\DatosUnicosPorSolicitude', 'id_tipos_de_datos', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    

}
