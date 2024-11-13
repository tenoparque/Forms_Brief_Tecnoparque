<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Politica
 *
 * @property $id
 * @property $link
 * @property $descripcion
 * @property $qr
 * @property $id_usuario
 * @property $id_estado
 * @property $titulo
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Politica extends Model
{

    static $rules = [
        // 'link' => 'required',
        'titulo' => 'required',
        'descripcion' => 'required',
        'id_usuario' => 'required',
        'id_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descripcion', 'qr', 'id_usuario', 'id_estado',];


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
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }

    public function acceptances()
    {
        return $this->hasMany(PolicyAcceptance::class);
    }
}
