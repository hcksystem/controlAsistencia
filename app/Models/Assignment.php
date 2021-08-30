<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $table = 'asignaciones';

   protected $fillable = [
        'id','user_id','planner_id','since','until'
   ];

   public $timestamps  = false;

    /**
    * Get the user that owns the Operations.
    */

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function planner()
    {
        return $this->belongsTo('App\Models\Planner','planner_id');
    }

}
