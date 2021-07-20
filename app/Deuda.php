<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'admin_edificios_deuda';

   protected $fillable = [
       'edificio_id', 'periodo','agua','gas','luz','agua_monto','luz_monto','gas_monto','agua_resolucion',
       'luz_resolucion','gas_resolucion'
   ];

   public $timestamps  = false;

  
}
