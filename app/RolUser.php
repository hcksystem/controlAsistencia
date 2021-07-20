<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'role_user';

    protected $fillable = [
        'user_id', 'role_id'
    ];

    public function rol()
    {
        return $this->belongsTo('App\Role','role_id','id');
    }

}


