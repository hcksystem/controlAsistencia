<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersStatus extends Model
{
    protected $table = 'users_status';

    protected $fillable = [
        'name','description'
    ];
}
