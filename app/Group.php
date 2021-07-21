<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = [
        'group','id_group_parent'
    ];

    public $timestamps = true;
}
