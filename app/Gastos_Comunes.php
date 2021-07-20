<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos_Comunes extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_gastos_comunes';

   protected $fillable = [
       'edificio_id', 'gastos_comunes','mgc_1mes','mgc_1mes','mgc_3mes','mgc_6mes','mgc_12mes','mgc_12mes_mas'
   ];

   public $timestamps  = false;

  
}
