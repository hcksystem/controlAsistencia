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
 
    public function tipo()
    {
        return $this->belongsTo('App\Models\Type_Planner','tipo_planificador');
    }

    public function estado($e)
    {
        if($e == 0){
            return 'Activo';
        }else{
            return 'Inactivo';
        }
    }

}
