<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'adm_edificios_contactos';

	protected $fillable = [
	    'tipo_contacto_id','edificio_id','nombre','contacto','telefono','correo'
	   ];
	public $timestamps = false;

	 public function tipo()
    {
        return $this->belongsTo('App\Tipo_Contacto', 'tipo_contacto_id');
    }
}
