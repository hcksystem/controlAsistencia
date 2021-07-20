<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaEspacio extends Model
{
    protected $table = 'adm_reserva_espacios';

   protected $fillable = [
       'edificio_id', 'espacio_id','fecha_creacion','fecha_reserva','hora_inicio','hora_fin','observaciones','departamento','creado_por','telefono','id_status'
   ];

   public $timestamps  = false;

   public function edificio()
   {
        return $this->belongsTo('App\Building', 'edificio_id');
   }

    public function status()
   {
        return $this->belongsTo('App\Status_Reserva', 'id_status');
   }


    public function usuario()
    {
        return $this->belongsTo('App\User', 'creado_por');
    }
}
