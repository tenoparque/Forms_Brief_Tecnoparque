<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property CategoriasEventosEspeciale[] $categoriasEventosEspeciales
 * @property DatosUnicosPorSolicitude[] $datosUnicosPorSolicitudes
 * @property EstadosDeLasSolictude[] $estadosDeLasSolictudes
 * @property EventosEspecialesPorCategoria[] $eventosEspecialesPorCategorias
 * @property HistorialDeUsuariosPorSolicitude[] $historialDeUsuariosPorSolicitudes
 * @property Nodo[] $nodos
 * @property Personalizacione[] $personalizaciones
 * @property Politica[] $politicas
 * @property ServiciosPorTiposDeSolicitude[] $serviciosPorTiposDeSolicitudes
 * @property TiposDeDato[] $tiposDeDatos
 * @property TiposDeSolicitude[] $tiposDeSolicitudes
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
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
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriasEventosEspeciales()
    {
        return $this->hasMany('App\Models\CategoriasEventosEspeciale', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosUnicosPorSolicitudes()
    {
        return $this->hasMany('App\Models\DatosUnicosPorSolicitude', 'id_estados', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estadosDeLasSolictudes()
    {
        return $this->hasMany('App\Models\EstadosDeLasSolictude', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventosEspecialesPorCategorias()
    {
        return $this->hasMany('App\Models\EventosEspecialesPorCategoria', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeUsuariosPorSolicitudes()
    {
        return $this->hasMany('App\Models\HistorialDeUsuariosPorSolicitude', 'id_estados', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nodos()
    {
        return $this->hasMany('App\Models\Nodo', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalizaciones()
    {
        return $this->hasMany('App\Models\Personalizacione', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function politicas()
    {
        return $this->hasMany('App\Models\Politica', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviciosPorTiposDeSolicitudes()
    {
        return $this->hasMany('App\Models\ServiciosPorTiposDeSolicitude', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiposDeDatos()
    {
        return $this->hasMany('App\Models\TiposDeDato', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiposDeSolicitudes()
    {
        return $this->hasMany('App\Models\TiposDeSolicitude', 'id_estado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id_estado', 'id');
    }
    

}
