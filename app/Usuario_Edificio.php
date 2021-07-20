<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Edificio extends Model
{
    protected $table = 'adm_usuarios_edificios';

	protected $fillable = [
	       'id_usuario', 'id_edificio'
	   ];

	public $timestamps = false;

	 public function edificio()
    {
        return $this->belongsTo('App\Building', 'id_edificio');
    }
   
}
