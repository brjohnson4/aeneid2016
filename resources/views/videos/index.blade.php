@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center">
        <h2>Most Recent Videos</h2>
    </div>   
            <ul class="nav nav-pills nav-justified">
                <li><a class="active" href="?">Show All</a></li>
                <li><a href="?book=1">Book 1</a></li>
                <li><a href="?book=2">Book 2</a></li>
                <li><a href="?book=4">Book 4</a></li>
                <li><a href="?book=6">Book 6</a></li>
            </ul>
			<div class="spacer-30"></div>
	        @foreach ($videos as $video)
	        <div id="id="pjax-container">
	        <a href="videos/{{ $video->urlSlug }}" class="no-decoration-link">
			    <div class="media" >    
				    <div class="media-left">
				        @if ($video->youtubeID == 'blah')
					        <img src="{{ url('img/thumbnails') }}/{{ $video->urlSlug }}.jpg" class="media-object thumbnail" alt="videothumb" style="width:200px">
				        @else
				            <img src="http://img.youtube.com/vi/{{ $video->youtubeID }}/maxresdefault.jpg" class="media-object thumbnail" alt="videothumb" style="width:200px">
						@endif
				    </div>
					<div class="media-body">
						<h4 class="media-heading">{{ $video->title }}</h4>
						{{ $video->description }}
					</div>
			    </div>
					</a>
			@endforeach
			</div>
	<div class="pagination-container text-center m-t">{!! $videos->render() !!}</div>

    </div>
</div>

<script type="text/javascript">
	$(document).pjax('a', '#pjax-container');
</script>

@stop