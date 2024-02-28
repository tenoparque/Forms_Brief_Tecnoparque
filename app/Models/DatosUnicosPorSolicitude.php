<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosUnicosPorSolicitude
 *
 * @property $id
 * @property $nombre
 * @property $id_tipos_de_datos
 * @property $id_tipos_de_solicitudes
 * @property $id_estados
 * @property $created_at
 * @property $updated_at
 *
 * @property DatosPorSolicitud[] $datosPorSolicituds
 * @property Estado $estado
 * @property TiposDeDato $tiposDeDato
 * @property TiposDeSolicitude $tiposDeSolicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DatosUnicosPorSolicitude extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_tipos_de_datos' => 'required',
		'id_tipos_de_solicitudes' => 'required',
		'id_estados' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_tipos_de_datos','id_tipos_de_solicitudes','id_estados'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datosPorSolicituds()
    {
        return $this->hasMany('App\Models\DatosPorSolicitud', 'id_datos_unicos_por_solicitudes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estados');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposDeDato()
    {
        return $this->hasOne('App\Models\TiposDeDato', 'id', 'id_tipos_de_datos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposDeSolicitude()
    {
        return $this->hasOne('App\Models\TiposDeSolicitude', 'id', 'id_tipos_de_solicitudes');
    }
    

}
