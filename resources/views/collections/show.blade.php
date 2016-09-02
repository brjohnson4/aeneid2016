@extends('layouts.app')

@section('content')

<div class="spacer-30"></div>

<div class="text-center">
<img src="{{ url('/img') }}/{{ $collection->thumbnail }}" height="100px">
</div>
<div class="container">
	<div class="row">
    	<div class="col-md-12 col-xs-12 text-center">
	    	<p style="font-size:1.3em"></p>
			<h3 class="fancy"><span>{{ $collection->title }}: {{ $collection->subTitle }}</span></h3>
		</div>
		<div class="col-md-12 col-xs-12">
			<p>{{ $collection->description }}</p>
			<div class="text-center">
				<div class="col-md-4 center">Series Views: {{ $total_views }}</div>
				<div class="col-md-4 center">{{ $count }} Lessons</div>
				<div class="col-md-4 center">{{ number_format($total_time, 2) }} Minutes</div>
			</div>
		</div>
		<div class="panel panel-default col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 m-y">
			<table class="table table-hover">
			  	@foreach ($videos as $video)
		    	<tr><td>{{ $video->pivot->order }}</td><td><a href="{{ url('/videos') }}/{{ $video->urlSlug }}">{{ $video->title }}</a></td><td>{{ $video->length }}</td></tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
</div>
@stop