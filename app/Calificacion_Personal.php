<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion_Personal extends Model
{
    
   protected $table = 'adm_calificacion_personal';

   protected $fillable = [
       'ID','edificio_id', 'periodo','respeto','comunicacion','escucha','actitud','resolucion','responsabilidad','notas'
   ];

   public $timestamps  = false;
}