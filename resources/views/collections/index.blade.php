@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center">
        <h2>Series</h2>
    </div>   
            <ul class="nav nav-pills nav-justified">
                <li><a class="active" href="#" data-filter="*">Show All</a></li>
                <li><a href="#" data-filter=".book-1">Book 1</a></li>
                <li><a href="#" data-filter=".book-2">Book 2</a></li>
                <li><a href="#" data-filter=".book-4">Book 4</a></li>
                <li><a href="#" data-filter=".book-6">Book 6</a></li>
            </ul>

    <div class="row">
	        
	        @foreach ($collections as $collection)
	        
		    <div class="col-md-4">
                <a href="{{ url('series') }}/{{ $collection->urlSlug }}" class="thumbnail">
	            <img src="{{ url('img') }}/{{ $collection->thumbnail }}" class="img-responsive" alt="videothumb">
                </a>
		    <div class="work-desc">
		        <h4><a href="{{ url('series') }}/{{ $collection->urlSlug }}" class="no-decoration-link">{{ $collection->title }}: {{ $collection->subTitle }}</a></h4>
	        </div>
		    </div>

			@endforeach

	<div class="pagination-container text-center m-t">{!! $collections->render() !!}</div>

    </div>
</div>
</div>
@stop