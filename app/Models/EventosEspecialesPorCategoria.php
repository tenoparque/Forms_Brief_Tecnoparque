<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EventosEspecialesPorCategoria
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $id_eventos_especiales
 * @property $created_at
 * @property $updated_at
 *
 * @property CategoriasEventosEspeciale $categoriasEventosEspeciale
 * @property Estado $estado
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EventosEspecialesPorCategoria extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_estado' => 'required',
		'id_eventos_especiales' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_estado','id_eventos_especiales'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriasEventosEspeciale()
    {
        return $this->hasOne('App\Models\CategoriasEventosEspeciale', 'id', 'id_eventos_especiales');
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
    public function solicitudes()
    {
        return $this->hasMany('App\Models\Solicitude', 'id_eventos_especiales_por_categorias', 'id');
    }
    

}
