<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio_Documento extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_edificios_documentos';

   protected $fillable = [
       'id','edificio_id', 'documento_id','nombre','file'
   ];

    public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
   public function documento()
    {
        return $this->belongsTo('App\Tipo_Documento', 'documento_id');
    }

}
