<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingMetaType extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'id','active', 'data_type_id','order','created_at'
   ];

    /**
    * Get the user that owns the Operations.
    */
    public function buildingMeta()
    {
        return $this->hasMany('App\BuildingMeta');
    }

}
