@extends('layouts.app')

@section('content')

<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Book {{$video->book }}</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Aeneid</a></li>
                    <li><a href="{{ url('videos') }}">Videos</a></li>
                    <li><a href="{{ url('videos') }}/{{ $video->urlSlug }}">{{ $video->shortTitle }}</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="divide80"></div>
<div class="container">
	<div class="row">
	    <div class="col-md-6">
            <h4>The Latin</h4>
	            <div class="latin-block">
		            @foreach($lines as $line)@if ($line->word == '<br>')</p></div>
		            @elseif ($line->line_order == 1)<div class="line-numbers">@if (mb_substr($line->line, -1) == 0)<p>{{ $line->line }}</p>@elseif (mb_substr($line->line, -1) == 5)<p>{{ $line->line }}</p>@else<p></p>@endif</div><div class="latin-text"><p data-section-id="{{ $line->line_id }}" class="commentable-section"><a tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" title="{{ $line->word }}"  DATA-content="{{ $line->short_def }}">{{ $line->punctuation }}</a>@else<a tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" title="{{ $line->word }}"  DATA-content="{{ $line->short_def }}">{{ $line->punctuation }}</a>@endif @endforeach
				</div>
	    </div>
	    <div class="col-sm-12 col-xs-12 hidden-md hidden-lg hidden-xl divide35"></div>
	    <div class="col-md-6">
		    <h4>{!! $question->question !!}</h4>
		    {!! Form::open(array('url' => 'videos/'.$video->urlSlug.'/answer')) !!}
		    	{!! Form::hidden('questionID', $question->id) !!}
		    	{!! Form::hidden('video', $video->id) !!}
		    	@foreach ($answers as $answer)
		    	{!! Form::submit($answer, ['name' => 'answer', 'class' => 'btn btn-default col-md-12 col-sm-12 col-xs-12 button-quiz', 'style' => 'margin-bottom: 10px']) !!}
		    	@endforeach
		    {!! Form::close() !!}
	    </div>
	</div>
</div>

@stop