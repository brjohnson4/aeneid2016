@extends('layouts.app')

@section('content')
<div class="spacer-30"></div>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6 hidden-xs text-right">
                <a href="{{ url('/') }}" style="text-decoration: none; color: inherit">Aeneid</a> / <a href="{{ url('videos') }}" style="text-decoration: none; color: inherit">Videos</a> / <a href="{{ url('videos') }}/{{ $video->urlSlug }}" style="text-decoration: none; color: inherit">{{ $video->shortTitle }}</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
	</div><!--img slide row-->
	<div class="row m-y">
	    <div class="col-md-8 m-b col-md-offset-2">
	        <div class="project-detail">
	            <h3>{{ $video->title }}</h3>
	            <br>
	            @foreach($lines as $latin)
	            	@if($latin->vocab()->where('user_id', Auth::user()->id)->count() > 0)
	            	<p><b>{{ $latin->dictionary->dictionary_entry }}</b> (line {{ $latin->line }}): {{ $latin->short_def }} {{ $latin->vocab()->count() }}</p>
	            	@endif
	            @endforeach
	            <p></p>
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