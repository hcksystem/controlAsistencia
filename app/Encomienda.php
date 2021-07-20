<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_encomienda';

   protected $fillable = [
       'edificio_id', 'usuario_id','descripcion','departamento','destinatario','fecha_hora_recepcion','status_id','fecha_entrega_recepcion'
   ];

   public $timestamps  = false;

   public function edificio()
   {
        return $this->belongsTo('App\Building', 'edificio_id');
   }

    public function status()
   {
        return $this->belongsTo('App\Status_Encomienda', 'status_id');
   }
  
}
