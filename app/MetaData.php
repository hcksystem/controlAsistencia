<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'campo', ' requerido', 'moduloID', 'dataTypeID','activo','orden','fechaCreacion'
   ];

   /**
    * Get the building for the blog building_type.
    */
   public function buildings()
   {
       return $this->belongsTo('App\Building', 'building_id');
   }

   /**
    * Get the building for the blog building_type.
    */
   public function buildingsMetaTypes()
   {
       return $this->belongsTo('App\BuildingMetaType', 'building_meta_type_id');
   }
}
