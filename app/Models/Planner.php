<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'planificador';

   protected $fillable = [
        'id','descripcion','tipo_planificador','Estado','planificacion'
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
