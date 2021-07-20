<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frecuencia_Recambio extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_frecuencia_recambio';

   protected $fillable = [
       'edificio_id', 'periodo','recambio'
   ];

   public $timestamps  = false;

  
}
