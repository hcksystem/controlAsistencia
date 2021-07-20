<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_demanda';

   protected $fillable = [
       'edificio_id', 'periodo','deuda','concepto'
   ];

   public $timestamps  = false;

  
}
