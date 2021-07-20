<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantencion_Co extends Model
{
    
   protected $table = 'adm_mant_co';

   protected $fillable = [
       'edificio_id', 'periodo','lavanderia','quinchos','piscinas','salon','gimnasio','sala_cine','sala_juegos','calderas','bombas','paneles','ascensores','portones','camaras','areas_verdes','aseo'
   ];

   public $timestamps  = false;
}
