<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planner_Weekly extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'planificador_semanal';

   protected $fillable = [
        'id','id_planificador','turno_dia1','turno_dia2','turno_dia3','turno_dia4','turno_dia5','turno_dia6','turno_dia7'
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