<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    
     /**
     * Get the user that owns the Ports.
     */
    public function commune()
    {
        return $this->hasMany('App\Commune');
    }
}
