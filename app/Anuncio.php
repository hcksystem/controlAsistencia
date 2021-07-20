<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'adm_edificios_anuncios';

	protected $fillable = [
	    'id','id_edificio','id_servicio','id_usuario','id_status','descripcion','correo_contacto','solicitado_por','fecha_anuncio','titulo'
	   ];
	public $timestamps = false;

	 public function edificio()
    {
        return $this->belongsTo('App\Building', 'id_edificio');
    }

     public function servicio()
    {
        return $this->belongsTo('App\Concepto', 'id_servicio');
    }

      public function estatus()
    {

        return $this->belongsTo('App\Concepto', 'id_servicio');

    }
}
