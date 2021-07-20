<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaList extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'adm_metalist';

   protected $fillable = [
       'metaTypeID', 'metaListValue'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */
 
    public function metaType()
    {
        return $this->belongsTo('App\MetaType', 'metaTypeID');
    }

}
