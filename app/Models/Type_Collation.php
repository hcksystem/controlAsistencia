<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Collation extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'tipo_colacion';

   protected $fillable = [
        'id','name','created_at','updated_at'
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
