@extends('layouts.app')

@section('content')
<div class="spacer-30"></div>
<div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="embed-responsive embed-responsive-16by9">
		        @if(Auth::check())
				<iframe src="https://player.vimeo.com/video/{{ $video->vimeoID}}?title=0&byline=0&portrait=0"></iframe>
				@else
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->youtubeID }}" frameborder="0" allowfullscreen></iframe>
				@endif
		        </p>
	        </div>
	    </div>
	</div><!--img slide row-->
	<div class="row m-y">
	    <div class="col-md-8 m-b">
	        <div class="project-detail">
	            <h3>{{ $video->title }}</h3>
	            <em class="margin-bottom-40">Book {{ $video->book }} / Lines {{ $video->lineStart }} - {{ $video->lineEnd }}</em>
	            <br>
	            <p>{{ $video->description }}</p>
	        </div>
	    </div>
	
	    <div class="col-md-4 m-b">
	        <div class="project-info text-center">
<!--
	            <h3>Project info</h3>
	            <p>
	                <strong>Client</strong> : Design_mylife<br>
	                <strong>Categories</strong> : HTML5 / CSS3<br>
	                <strong>Project Url </strong>: Wrapbootstrap
	            </p>
	            <ul class="list-inline top-social">
	                <li>Share:</li>
	                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
	                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	            </ul>
	            <br>
-->
<!-- 	            <a href="{{ $video->urlSlug }}/question" class="btn btn-lg btn-primary m-t" style="width:80%">Quiz Me</a></span> -->
	            <a href="{{ $video->urlSlug }}/vocabulary" class="btn btn-lg btn-primary m-t" style="width:80%">My Vocabulary</a>
	            <a href="{{ $video->urlSlug }}/latin" class="btn btn-lg btn-primary m-t" style="width:80%">The Latin</a>
	        </div>
	    </div>
	</div>
	<div class="col-md-8 col-md-offset-2">
<nav>
  <ul class="pager">
	@if($previousVideo)
    	<li class="previous"><a href="{{ url('/videos', $previousVideo->urlSlug) }}"><span aria-hidden="true">&larr;</span> Back</a></li>
    @endif
    @if($nextVideo)
    <li class="next"><a href="{{ url('/videos', $nextVideo->urlSlug) }}">Next <span aria-hidden="true">&rarr;</span></a></li>
    @endif
  </ul>
</nav>
</div>

	<div>
	<hr>
    	<div class="col-md-12 col-xs-12 text-center m-t">
	    	<p style="font-size:1.3em">This video is part of the series</p>
			<h3>{{ $collection->subTitle }}</h3>
		</div>
		<div class="col-md-12 col-xs-12">
			<p>{{ $collection->description }}</p>
			<div class="text-center">
				<div class="col-md-4 center">Series Views: {{ $total_views }}</div>
				<div class="col-md-4 center">{{ $count }} Lessons</div>
				<div class="col-md-4 center">{{ $total_time }} Minutes</div>
			</div>
		</div>
		<div class="panel panel-default col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
			<div class="table">
			  	@foreach ($collection_videos as $collection_video)
			  	<a class="no-decoration-link" href="{{ url('/videos') }}/{{ $collection_video->urlSlug }}">
		    	<div class="cell-row">
			    	<div class="cell">{{ $collection_video->pivot->order }}</div>
			    	<div class="cell">{{ $collection_video->title }}</div>
			    	<div class="cell">{{ str_replace('00:', '', $collection_video->length) }}</div>
		    	</div>
			  	</a>
				@endforeach
			</div>
		</div>
		
	</div>
</div>

	
	<script>
		$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>

@stop