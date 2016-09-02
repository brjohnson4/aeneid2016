<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    
    protected $fillable = [
    	'question_id', 
    	'user_id', 
    	'correct', 
    	'question_old_rating', 
    	'question_new_rating',
		'user_old_rating',
		'user_new_rating',
		'xp_gained',
		'user_answer',
		'correct_answer',
 		'time_spent',
 		'category_id',
 		'video_id',
 		'user_name',
   	];

	public function user() 
	{
		return $this->belongsTo('App\User');
	}

	public function category() 
	{
		return $this->belongsTo('App\Category');
	}

	public function video() 
	{
		return $this->belongsTo('App\Video');
	}


}
