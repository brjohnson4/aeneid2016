<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Vocab;
use Auth;
use App\Video;
use App\Latin;

use App\Http\Requests;

class VocabController extends Controller
{

    public function store(Request $request)
    {
		$dictionary_id = Input::get('dictionary');
		$word_id = Input::get('word');
				
		Vocab::create([
			'dictionary_id'	=> $dictionary_id,
			'user_id'		=> Auth::user()->id,
			'latin_id'		=> $word_id,
		]);
    }
    
    public function show($url_slug)
    {
	    $video = Video::where('urlSlug', $url_slug)
			->first();
		
		$lines = Latin::where('book', $video->book)
			->where('line', '>=', $video->lineStart)
			->where('line', '<=', $video->lineEnd)
			->where('lemma', '!=', 'p')
			->orderBy('line')
			->orderBy('line_order')
			->get()
			->sortByDesc(function($post) {
				return $post->vocab->count();
				});
		
		return view('videos.vocab', compact('lines', 'video'));
		

    }


}
