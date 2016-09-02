<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latin extends Model
{

    protected $table = 'latin';

	protected $guarded = [
		'word',
		'punctuation',
		'short_def',
		'book',
		'line',
		'lemma',
		'line_id'
	];

	public function aeneid() 
	{
		return $this->belongsTo('App\Aeneid', 'id');
	}

	public function dictionary() 
	{
		return $this->belongsTo('App\Dictionary');
	}

	public function notes()
	{
		return $this->hasMany('App\Note');
	}

	public function vocab()
	{
		return $this->hasMany('App\Vocab');
	}

}
