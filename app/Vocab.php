<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocab extends Model
{

    protected $table = 'vocab';

    protected $fillable = [
		'dictionary_id',
		'latin_id',
		'user_id',
		];

	public function latin()
	{
		return $this->belongsTo('App\Latin');
	}

	public function dictionary()
	{
		return $this->belongsTo('App\Dictionary');
	}
		
}
