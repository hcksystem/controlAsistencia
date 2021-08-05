<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = [
        'id_user','tipo','sistema','fecha','ip','image','latitude','longitude'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
