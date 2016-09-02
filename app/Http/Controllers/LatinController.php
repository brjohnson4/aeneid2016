<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Latin;
use App\Video;
use App\Aeneid;
use App\Note;
use Input;
use Auth;
use App\User;
use App\Collection;
use Response;

class LatinController extends Controller
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
    public function index()
    {
        return view('latin.text');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {

		$lines = Latin::where('book', $book)
			->where('lemma', '!=', 'p')
			->orderBy('line')
			->orderBy('line_order')
			->get();
			
		$numbers = Latin::where('book', $book)
			->orderBy('line')
			->groupBy('line')
			->get();
			
		$first = $lines->first()->line_id;
		$last = $lines->max('line_id');
			
		$notes = Note::select('line_number')
			->where('authorId', Auth::user()->id)
			->whereBetween('line_number', array($first, $last))
			->groupBy('line_number')
			->get();

		$jsonResult = array();
		
		for($i = 0; $i < count($notes); $i++)
		{
			$jsonResult[$i]["sectionId"] = $notes[$i]->line_number;
			$sectionId = $notes[$i]->line_number;
			$jsonResult[$i]["comments"] = Note::select('comment', 'authorName', 'authorId', 'id')->where('line_number', $sectionId)->where('authorId', Auth::user()->id)->get();
		}
		
 		$notes = json_encode($jsonResult);

		return view('latin.book', compact('numbers', 'lines', 'notes', 'book'));

    }

	public function video($url_slug)
	{
		$video = Video::where('urlSlug', $url_slug)
			->first();
		$collectionOrder = $video->collections()->first()->pivot->order;
		$collection = $video->collections()->first()->pivot->collection_id;

		$nextVideo = Video::where('id', $video->id + 1)
			->first();
		$previousVideo = Video::where('id', $video->id - 1)
			->first();

		$nextCollection = Collection::where('id', $collection + 1)
			->first();
		$previousCollection = Collection::where('id', $collection -1)
			->first();

		$lines = Latin::where('book', $video->book)
			->where('line', '>=', $video->lineStart)
			->where('line', '<=', $video->lineEnd)
			->where('lemma', '!=', 'p')
			->orderBy('line')
			->orderBy('line_order')
			->get();

		$numbers = Latin::where('line', '>=', $video->lineStart)
			->where('line', '<=', $video->lineEnd)
			->orderBy('line')
			->groupBy('line')
			->get();
			
		$first = $lines->first()->line_id;
		$last = $lines->max('line_id');
			
		$notes = Note::select('line_number')
			->where('authorId', Auth::user()->id)
			->whereBetween('line_number', array($first, $last))
			->groupBy('line_number')
			->get();
		$jsonResult = array();
		
		for($i = 0; $i < count($notes); $i++)
		{
			$jsonResult[$i]["sectionId"] = $notes[$i]->line_number;
			$sectionId = $notes[$i]->line_number;
			$jsonResult[$i]["comments"] = Note::select('comment', 'authorName', 'authorId', 'id')->where('line_number', $sectionId)->where('authorId', Auth::user()->id)->get();
		}
		
 		$notes = json_encode($jsonResult);


		return view('latin.latin', compact('numbers', 'video', 'lines', 'notes', 'first', 'last', 'nextVideo', 'previousVideo', 'nextCollection', 'previousCollection'));

	}
	
}
