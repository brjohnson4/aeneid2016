<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Video;
use App\Latin;
use App\Aeneid;
use App\Question;
use DB;
use DatabaseTransactions;
use App\Collection;

class VideosController extends Controller
{
	
	public function __construct()
	{
	    $this->middleware('auth');
	}	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $book = $request->book;
	    if($book) {
		    $videos = Video::where('book', $book)->orderBy('published_at', 'desc')->paginate(15);
	    } else {
	        $videos = Video::orderBy('published_at', 'desc')->paginate(15);
        }
        return view('videos.index', compact('videos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url_slug)
    {

		$video = Video::where('urlSlug', $url_slug)->first();

		$lines = Latin::where('book', $video->book)
					->where('line', '>=', $video->lineStart)
					->where('line', '<=', $video->lineEnd)
					->where('lemma', '!=', 'p')
					->orderBy('line')
					->orderBy('line_order')
					->get();
		
		$nextVideo = Video::where('id', $video->id + 1)
			->first();
		$previousVideo = Video::where('id', $video->id - 1)
			->first();
			
					
		$collection = $video->collections()->first();
		$collection_videos = $collection->videos()->orderBy('order')->get();
		$count = $collection->videos()->count();
		$total_time = $collection->videos()->sum(DB::raw('TIME_TO_SEC(length)'))/60;
		$total_views = $collection->videos()->sum('views');

		$numbers = Latin::where('line', '>=', $video->lineStart)
			->where('line', '<=', $video->lineEnd)
			->orderBy('line')
			->groupBy('line')
			->get();


		return view('videos.show', compact('video', 'lines', 'collection', 'collection_videos', 'count', 'total_time', 'total_views', 'numbers', 'nextVideo', 'previousVideo'));
		
    }
    
    public function latin($url_slug)
    {

    }

}
