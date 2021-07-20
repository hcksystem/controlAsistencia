<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto_Comun extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_gastos_comunes';

   protected $fillable = [
      'id','edificio_id','monto_dpto_pequenno','monto_dpto_grande','periodo','file','file_dpto_grande'
   ];

   public $timestamps  = false;

  
}
