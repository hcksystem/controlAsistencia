<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Turn extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'type_turns';

   protected $fillable = [
        'id','name','description'
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
