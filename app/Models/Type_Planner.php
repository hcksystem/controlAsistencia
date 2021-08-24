<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Planner extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'tipo_planificador';

   protected $fillable = [
        'id','nombre'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
 
    public function metaType()
    {
        return $this->belongsTo('App\MetaType', 'metaTypeID');
    }

}
