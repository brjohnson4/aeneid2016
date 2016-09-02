<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

	/**
	 * Get the videos associated with the given collection.
	 * 
	 * @access public
	 * @return void
	 */
	public function videos()
	{
		return $this->belongsToMany('App\Video')->withPivot('order')->withTimestamps();
	}

}
