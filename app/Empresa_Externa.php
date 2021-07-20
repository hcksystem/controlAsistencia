<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa_Externa extends Model
{
    protected $table = 'adm_empresas_externas';

	protected $fillable = [
	    'id','identificacion','direccion','telefono','region_id','comuna_id','logo','contacto','trayectoria','cant_ciudades'
	   ];
	public $timestamps = false;

	 public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }

     public function commune()
    {
        return $this->belongsTo('App\Commune', 'comuna_id');
    }
}
