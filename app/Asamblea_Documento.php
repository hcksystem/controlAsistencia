<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asamblea_Documento extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_asamblea_documentos';

   protected $fillable = [
       'id','edificio_id', 'asamblea_id','nombre','tipo_documento','file'
   ];

    public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
    public function documento()
    {
        return $this->belongsTo('App\Tipo_Documento', 'tipo_documento');
    }

}
