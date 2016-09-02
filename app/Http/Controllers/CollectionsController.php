<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Collection as Collection;
use App\Video as Video;
use DB;

class CollectionsController extends Controller
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
        $collections = Collection::orderBy('updated_at', 'desc')->paginate(15);
        return view('collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url_slug)
    {
		$collection = Collection::where('urlSlug', $url_slug)->first();
		$videos = $collection->videos()->orderBy('order')->get();
		$count = $collection->videos()->count();
		$total_time = $collection->videos()->sum(DB::raw('TIME_TO_SEC(length)'))/60;
		$total_views = $collection->videos()->sum('views');

		return view('collections.show', compact('collection', 'videos', 'count', 'total_time', 'total_views'));

	}
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
