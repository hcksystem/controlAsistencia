<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdificioTipologia extends Model
{
    protected $table = 'adm_edificios_tipologias';

	protected $fillable = [
	    'id_edificio','id_tipologia','rentabilidad','cantidad'
	   ];

	public $timestamps = false;

	public function edificio_tipologia()
    {
        return $this->belongsTo('App\Tipologia', 'id_tipologia');
    }
}
