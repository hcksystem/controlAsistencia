<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'turns';

   protected $fillable = [
        'id','ingreso','ingreso_max','colacion','detalles','salida','horas_trabajo','tiempo_colacion','tipo_turno','created_at','updated_at'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
 
    public function tipo()
    {
        return $this->belongsTo('App\Models\Type_Turn','tipo_turno');
    }

}
