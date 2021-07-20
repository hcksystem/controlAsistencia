<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Contacto extends Model
{
    protected $table = 'adm_tipo_contacto';

	protected $fillable = [
	    'nombre'
	   ];
	public $timestamps = false;

	
}
