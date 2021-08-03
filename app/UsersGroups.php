<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersGroups extends Model
{
    protected $table = 'users_groups';

    protected $fillable = [
        'id_user','id_group'
    ];
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Group', 'id_group','id');
    }
}
