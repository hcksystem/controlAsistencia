<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table    = 'buildings';
    public $timestamps  = false;
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'construction',
        'region_id',
        'commune_id',
        'address',
        'longitude',
        'latitude',
        'cantidad_dptos',
        'cantidad_pisos',
        'cantidad_est',
        'cantidad_est_visitas',
        'cantidad_sub',
        'constructora', 
        'gastos_comunes_m2',
        'admiten_mascotas', 
        'Tipo_piso',
        'administracion_id',
        'telefono', 
        'deuda_agua',
        'deuda_gas',
        'deuda_luz',
        'resolucion_agua',
        'resolucion_gas',
        'resolucion_luz',
        'demanda',
        'concepto_demanda',
        'revestimiento',
        'cubierta_cocina',
        'ventanas',
        'cocina',
        'agua_caliente',
        'cubierta_vanitorio',
        'calefaccion',
        'lavaplatos',
        'alarma'
    ];

    /**
     * Get the building for the blog buildings.
     */
    public function building()
    {
        return $this->belongsTo('App\Building', 'building_id');
    }

     public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }

     public function commune()
    {
        return $this->belongsTo('App\Commune', 'commune_id');
    }
}
