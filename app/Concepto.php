<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_concepto';

   protected $fillable = [
       'id','nombre'
   ];

   public $timestamps  = false;

  
}