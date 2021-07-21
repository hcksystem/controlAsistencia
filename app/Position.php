<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'positions';

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
