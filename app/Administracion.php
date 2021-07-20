<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    protected $table = 'adm_administraciones';

	protected $fillable = [
	    'nombre','direccion','telefono','contacto','presentacion','url_imagen'
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

      public function comuna($id)
    {

        return Commune::where('id', '=', $id)->value('name');

    }
}
