<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	
	protected $guarded = ['question', 'correctAnswer', 'distractorA', 'distractorB', 'distractorC', 'lineStart', 'lineEnd', 'book', 'category_id'];

	public function videos() 
	{
		return $this->belongsToMany('App\Video', 'id')->withTimestamps();
	}
	
	public function categories()
	{
		return $this->belongsTo('App\Category');
	}

}
