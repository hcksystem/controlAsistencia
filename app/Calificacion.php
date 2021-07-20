<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    
   protected $table = 'adm_calificacion';

   protected $fillable = [
       'edificio_id', 'periodo','calificacion'
   ];

   public $timestamps  = false;
}
