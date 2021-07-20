<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asamblea extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_asambleas';

   protected $fillable = [
       'id','edificio_id', 'creado_por','asunto','fecha','hora','descripcion','ubicacion','enlace_grabacion'
   ];

    public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
    public function buildingMeta()
    {
        return $this->hasMany('App\BuildingMeta');
    }

     public function usuario()
    {
        return $this->belongsTo('App\User', 'creado_por');
    }

}
