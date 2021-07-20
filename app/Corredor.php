<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commune; 

class Corredor extends Model
{
    protected $table = 'adm_corredores';

	protected $fillable = [
	    'id','identificacion','descripcion','direccion','telefono','region_id','comuna_id','logo','contacto','cant_ciudades'
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

     public function comuna($com)
    {
        return Commune::where('id',$com)->value('name');
    }
}
