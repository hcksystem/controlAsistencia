<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table = 'adm_tipologias';

	protected $fillable = [
	       'id', 'tipologia'
	   ];

	public $timestamps = false;
   
}
