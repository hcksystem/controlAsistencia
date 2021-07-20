<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioComun extends Model
{
   
   protected $table = 'adm_espacios_comunes';

   protected $fillable = [
       'edificio_id', 'creado_por_id','descripcion','nombre'
   ];

   public $timestamps  = false;

   public function edificio()
   {
        return $this->belongsTo('App\Building', 'edificio_id');
   }

   	public function usuario()
    {
        return $this->belongsTo('App\User', 'creado_por_id');
    }


}
