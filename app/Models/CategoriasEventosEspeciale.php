<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasEventosEspeciale
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property EventosEspecialesPorCategoria[] $eventosEspecialesPorCategorias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriasEventosEspeciale extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventosEspecialesPorCategorias()
    {
        return $this->hasMany('App\Models\EventosEspecialesPorCategoria', 'id_eventos_especiales', 'id');
    }
    

}
