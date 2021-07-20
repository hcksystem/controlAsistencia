<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{
    protected $table = 'adm_tipo_documento';

	protected $fillable = [
	  'id','nombre','descripcion'
	   ];
	public $timestamps = false;

	
}
