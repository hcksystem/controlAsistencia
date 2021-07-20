<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos_Dias extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_gastos_dias';

   protected $fillable = [
      'id','edificio_id','al_dia','dia_atrasado','periodo'
   ];

   public $timestamps  = false;

  
}
