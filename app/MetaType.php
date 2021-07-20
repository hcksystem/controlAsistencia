<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaType extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_metatype';

   protected $fillable = [
       'campo', 'requerido', 'moduloID', 'dataTypeID','activo','orden','fechaCreacion'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
    public function modulo()
    {
        return $this->belongsTo('App\adm_modulos', 'moduloID');
    }

    public function dataType()
    {
        return $this->belongsTo('App\adm_dataType', 'dataTypeID');
    }

}
