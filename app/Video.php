<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	/**
	 * Get the collections associated with each video.
	 * 
	 * @access public
	 * @return void
	 */
	 
	public function collections() 
	{
		return $this->belongsToMany('App\Collection')->withPivot('order')->withTimestamps();
	}

	/**
	 * Get the questions for each video.
	 * 
	 * @access public
	 * @return void
	 */
	public function questions() 
	{
		return $this->belongsToMany('App\Question')->withTimestamps();
	}

    public function results() 
	{
		return $this->hasMany('App\Result', 'video_id', 'id');
	}
	
}
