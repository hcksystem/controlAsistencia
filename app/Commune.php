<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'region_id'
    ];


	public $timestamps = false;
	/**
     * Get the account for the blog country.
     */
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }
}
