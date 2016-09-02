<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $table = 'notes';

    protected $fillable = [
		'line_number',
		'comment',
		'authorId',
		'authorName',
		];
	
	public function user() 
	{
		return $this->belongsTo('App\User');
	}
	
	public function latin()
	{
		return $this->hasMany('App\Latin');
	}
	
}
