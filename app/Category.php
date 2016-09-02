<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
    protected $table = 'categories';

    public function questions() 
	{
		return $this->hasMany('App\Question');
	}

    public function results() 
	{
		return $this->hasMany('App\Result', 'id', 'category_id');
	}


}
