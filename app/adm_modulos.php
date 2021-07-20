<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adm_modulos extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'modulo',
    ];
}
