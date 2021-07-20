<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arriendo extends Model
{
    protected $table = 'adm_edificios_arriendos';

	protected $fillable = [
	    'id','mes','tipologia_id','edificio_id','arriendo'
	   ];
	public $timestamps = false;

	
}
