<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Encomienda extends Model
{
    
   protected $table = 'adm_status_encomienda';

   protected $fillable = [
       'id', 'nombre'
   ];

   public $timestamps  = false;
}
