<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeneid extends Model
{
    protected $table = 'aeneid';

	public function latin() 
	{
		return $this->hasMany('App\Latin', 'line_id');
	}


}
