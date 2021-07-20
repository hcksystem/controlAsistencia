<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion_Administracion extends Model
{
    
   protected $table = 'adm_calificacion_administracion';

   protected $fillable = [
       'id','id_administracion','id_edificio', 'periodo','calificacion'
   ];

   public $timestamps  = false;
}
