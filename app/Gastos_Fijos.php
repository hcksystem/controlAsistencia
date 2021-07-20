<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos_Fijos extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_gastos_fijos';

   protected $fillable = [
       'edificio_id', 'agua','luz','telefono','conserjes'
   ];

   public $timestamps  = false;

  
}
