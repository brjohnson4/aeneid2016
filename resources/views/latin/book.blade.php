@extends('layouts.latin')

@section('content')

<div class="spacer-30"></div>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
			<div class="col-sm-12 hidden-xs text-right">
                    <a href="{{ url('/') }}" class="no-decoration-link">Aeneid</a> / <a href="{{ url('text') }}" class="no-decoration-link">Text</a> / <span class="no-decoration-link">Book {{ $book }}</span>
            </div>
        </div>
    </div>
</div><!--breadcrumbs-->

<div class="spacer-30"></div>
<div class="container">
	
    <div class="text-center">
        <h2>Book {{ $book }}</h2>
    </div>   
    <div class="spacer-30"></div>
	    <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-3">
   	            <div class="latin-block" id="commentable-container">
		            @foreach($lines as $line)@if ($line->word == '<br>')</p></div>
		            @elseif ($line->line_order == 1)<div class="line-numbers">@if (mb_substr($line->line, -1) == 0)<p>{{ $line->line }}</p>@elseif (mb_substr($line->line, -1) == 5)<p>{{ $line->line }}</p>@else<p></p>@endif</div><div class="latin-text"><p data-section-id="{{ $line->line_id }}" class="commentable-section"><a class="no-decoration-link" tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" title="{{ $line->word }}"  DATA-content="{{ $line->short_def }}">{{ $line->punctuation }}</a>@else<a class="no-decoration-link" tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" title="{{ $line->word }}"  DATA-content="{{ $line->short_def }}">{{ $line->punctuation }}</a>@endif @endforeach
				</div>
    </div>
</div>

@stop