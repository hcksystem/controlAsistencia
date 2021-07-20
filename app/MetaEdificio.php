<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaEdificio extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_meta_edificio';

   protected $fillable = [
       'edificioID', 'edificioMetaTypeID', 'value','fecha_creacion','fecha_actualizado'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
    public function edificio()
    {
        return $this->belongsTo('App\MetaType', 'edificioMetaTypeID');
    }

    public function dataType()
    {
        return $this->belongsTo('App\adm_dataType', 'dataTypeID');
    }

    public function metalist()
    {
        return $this->belongsTo('App\MetaList', 'value');
    }

}
