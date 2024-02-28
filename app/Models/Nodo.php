<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nodo
 *
 * @property $id
 * @property $nombre
 * @property $id_estado
 * @property $id_ciudad
 * @property $created_at
 * @property $updated_at
 *
 * @property Ciudade $ciudade
 * @property Estado $estado
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nodo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_estado' => 'required',
		'id_ciudad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_estado','id_ciudad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudade', 'id', 'id_ciudad');
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
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id_nodo', 'id');
    }
    

}
