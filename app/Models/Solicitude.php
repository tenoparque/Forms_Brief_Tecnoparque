<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitude
 *
 * @property $id
 * @property $id_tipos_de_solicitudes
 * @property $fecha_y_hora_de_la_solicitud
 * @property $id_usuario_que_realiza_la_solicitud
 * @property $id_eventos_especiales_por_categorias
 * @property $id_estado_de_la_solicitud
 * @property $created_at
 * @property $updated_at
 *
 * @property DatosPorSolicitud[] $datosPorSolicituds
 * @property ElementosPorSolicitude[] $elementosPorSolicitudes
 * @property EstadosDeLasSolictude $estadosDeLasSolictude
 * @property EventosEspecialesPorCategoria $eventosEspecialesPorCategoria
 * @property HistorialDeEstadosPorSolicitude[] $historialDeEstadosPorSolicitudes
 * @property HistorialDeModificacionesPorSolicitude[] $historialDeModificacionesPorSolicitudes
 * @property HistorialDeUsuariosPorSolicitude[] $historialDeUsuariosPorSolicitudes
 * @property TiposDeSolicitude $tiposDeSolicitude
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Solicitude extends Model
{
    
    static $rules = [
		'id_tipos_de_solicitudes' => 'required',
		'fecha_y_hora_de_la_solicitud' => 'required',
		'id_usuario_que_realiza_la_solicitud' => 'required',
		'id_eventos_especiales_por_categorias' => 'required',
		'id_estado_de_la_solicitud' => 'required',
        'drive_link' =>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_tipos_de_solicitudes','fecha_y_hora_de_la_solicitud','id_usuario_que_realiza_la_solicitud','id_eventos_especiales_por_categorias','id_estado_de_la_solicitud',  'drive_link'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosPorSolicituds()
    {
        return $this->hasMany('App\Models\DatosPorSolicitud', 'id_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elementosPorSolicitudes()
    {
        return $this->hasMany('App\Models\ElementosPorSolicitude', 'id_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadosDeLasSolictude()
    {
        return $this->hasOne('App\Models\EstadosDeLasSolictude', 'id', 'id_estado_de_la_solicitud');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function eventosEspecialesPorCategoria()
    {
        return $this->hasOne('App\Models\EventosEspecialesPorCategoria', 'id', 'id_eventos_especiales_por_categorias');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeEstadosPorSolicitudes()
    {
        return $this->hasMany('App\Models\HistorialDeEstadosPorSolicitude', 'id_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeModificacionesPorSolicitudes()
    {
        return $this->hasMany('App\Models\HistorialDeModificacionesPorSolicitude', 'id_soli', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialDeUsuariosPorSolicitudes()
    {
        return $this->hasMany('App\Models\HistorialDeUsuariosPorSolicitude', 'id_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposDeSolicitude()
    {
        return $this->hasOne('App\Models\TiposDeSolicitude', 'id', 'id_tipos_de_solicitudes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario_que_realiza_la_solicitud');
    }

    public function historial()
    {
        return $this->hasMany(HistorialDeUsuariosPorSolicitude::class, 'id_solicitudes');
    }
    

}
