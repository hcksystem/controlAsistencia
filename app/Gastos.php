<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_gastos';

   protected $fillable = [
      'id','edificio_id','concepto_id','estado_mayordomo','estado_copropietario','calificacion','url_boleta','periodo','proveedor'
   ];

   public $timestamps  = false;

  
}
