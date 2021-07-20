<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Reserva extends Model
{
    
   protected $table = 'adm_reserva_status';

   protected $fillable = [
       'id', 'nombre'
   ];

   public $timestamps  = false;
}
