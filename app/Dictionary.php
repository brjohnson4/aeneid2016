<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{

    protected $table = 'dictionary';

	public function latin()
	{
		return $this->hasMany('App\Latin');
	}

	public function vocabulary()
	{
		return $this->hasMany('App\Vocab');
	}


}
