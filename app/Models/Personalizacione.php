<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personalizacione
 *
 * @property $id
 * @property $logo
 * @property $color_principal
 * @property $color_secundario
 * @property $color_terciario
 * @property $id_users
 * @property $id_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Personalizacione extends Model
{
    
    static $rules = [
		'color_principal' => 'required',
		'color_secundario' => 'required',
		'color_terciario' => 'required',
		'id_users' => 'required',
        'id_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['logo','color_principal','color_secundario','color_terciario','id_users','id_estado'];


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
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_users');
    }

    

}
