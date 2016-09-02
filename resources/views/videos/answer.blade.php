@extends('layouts.app')

@section('content')

<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Book {{ $video->book }}</h4>
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
            <div class="line-numbers">
				@foreach($numbers as $number)
					@if (mb_substr($number->line, -1) == 0)
					{{ $number->line }}<br>
					@elseif (mb_substr($number->line, -1) == 5)
					{{ $number->line }}<br>
					@else
					<br>
					@endif
				@endforeach
            </div>
            <div class="latin-text">
	            @foreach($lines as $line)
					@if($line->word == '<br>'){!! $line->word !!}
					@else<a tabindex="0" DATA-TRIGGER="focus" DATA-container="body" DATA-toggle="popover" DATA-placement="top" title="{{ $line->word }}"  DATA-content="{{ $line->short_def }}">{{ $line->punctuation }}</a>
					@endif 
				@endforeach
			</div>
	    </div>

		<div class="col-md-6" style="text-align: center">
			<h1>{{ $correct_text }}</h1>
		
			<div class="col-md-8 col-md-offset-2">
				<p style="font-size:20px">{!! $correctAnswer->question !!}</p>
				@if ($correct_text == "Correct!")
				<p style="font-size:16px">Your answer: {!! $correctAnswer->correctAnswer !!}</p>
				@else
				<p style="font-size:16px">Your choice: {!! $answer !!}</p>
				<p style="font-size:16px">Correct answer: {!! $correctAnswer->correctAnswer !!}</p>
				@endif
			</div>
			<div class="col-md-12" style="text-align: center">
				<a href="question" class="btn btn-lg btn-theme-bg">Try Another</a>
			</div>
		</div>
	</div>
</div>
@stop