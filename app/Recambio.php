<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recambio extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_recambio';

   protected $fillable = [
       'edificio_id', 'periodo','frecuencia_id'
   ];

   public $timestamps  = false;

  
}
