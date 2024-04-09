<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $celular
 * @property $apellidos
 * @property $id_nodo
 * @property $id_estado
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Nodo $nodo
 * @property HistorialDeEstadosPorSolicitude[] $historialDeEstadosPorSolicitudes
 * @property HistorialDeUsuariosPorSolicitude[] $historialDeUsuariosPorSolicitudes
 * @property Personalizacione[] $personalizaciones
 * @property Politica[] $politicas
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos', // Adding the "apellidos" column
        'email',
        'password',
        'celular', // Adding the "celular" column
        'id_nodo', // Adding the "id_nodo" column
        'id_estado' // Adding the "id_estado" column
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
		'celular' => 'required|string',
		'apellidos' => 'required|string',
		'id_nodo' => 'required',
		'id_estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nodo()
    {
        return $this->belongsTo(\App\Models\Nodo::class, 'id_nodo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeEstadosPorSolicitudes()
    {
        //return $this->hasMany(\App\Models\HistorialDeEstadosPorSolicitude::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeUsuariosPorSolicitudes()
    {
        //return $this->hasMany(\App\Models\HistorialDeUsuariosPorSolicitude::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalizaciones()
    {
        return $this->hasMany(\App\Models\Personalizacione::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function politicas()
    {
        return $this->hasMany(\App\Models\Politica::class, 'id', 'id_usuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes()
    {
        return $this->hasMany(\App\Models\Solicitude::class, 'id', 'id_usuario_que_realiza_la_solicitud');
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token,$this));
    }
}
