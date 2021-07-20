<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adm_dataType extends Model
{
	protected $table = 'adm_dataType';
    protected $fillable = [
        'type'
    ];
    public $timestamps  = false;

    
}
