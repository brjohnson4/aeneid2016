@extends('layouts.latin')

@section('content')
<div class="spacer-30"></div>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>{{$video->title }}</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <a href="{{ url('/') }}" class="no-decoration-link">Aeneid</a> / <a href="{{ url('videos') }}" class="no-decoration-link">Videos</a> / <a href="{{ url('videos') }}/{{ $video->urlSlug }}" class="no-decoration-link">{{ $video->shortTitle }}</a>
            </div>
        </div>
    </div>
</div>
<div class="spacer-30"></div>
<div class="container">
	<div class="row">
	    <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-3">
   	            <div class="latin-block" id="commentable-container">
		            @foreach($lines as $line)@if ($line->word == '<br>')</p></div>
		            @elseif ($line->line_order == 1)<div class="line-numbers">@if (mb_substr($line->line, -1) == 0)<p>{{ $line->line }}</p>@elseif (mb_substr($line->line, -1) == 5)<p>{{ $line->line }}</p>@else<p></p>@endif</div><div class="latin-text"><p data-section-id="{{ $line->line_id }}" class="commentable-section"><a style="text-decoration: none; color: inherit" id="word" tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" DATA-content="{{ $line->short_def }}" DATA-dictionary="{{ $line->dictionary_id }}" DATA-title="{{ $line->dictionary->dictionary_entry }}" DATA-word="{{ $line->id }}">{{ $line->punctuation }}</a>@else<a style="text-decoration: none; color: inherit" id="word" tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" DATA-title="{{ $line->dictionary->dictionary_entry }}" DATA-content="{{ $line->short_def }}" DATA-dictionary="{{ $line->dictionary_id }}" DATA-word="{{ $line->id }}">{{ $line->punctuation }}</a>@endif @endforeach
				</div>
	    </div>
	</div>
<div class="col-md-6 col-md-offset-3">
<nav>
  <ul class="pager">
	@if($previousVideo)
    	<li class="previous"><a href="{{ url('/videos', $previousVideo->urlSlug) }}/latin"><span aria-hidden="true">&larr;</span> Back</a></li>
    @endif
    @if($nextVideo)
    <li class="next"><a href="{{ url('/videos', $nextVideo->urlSlug) }}/latin">Next <span aria-hidden="true">&rarr;</span></a></li>
    @elseif($nextCollection)
    <li class="next"><a href="{{ url('/series', $nextCollection->urlSlug) }}">Next Series<span aria-hidden="true">&rarr;</span></a></li>
    @endif
  </ul>
</nav>
</div>
</div>
</div>

@stop