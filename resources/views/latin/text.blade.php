@extends('layouts.app')

@section('content')

<div class="spacer-30"></div>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
			<div class="col-sm-12 hidden-xs text-right">
                    <a href="{{ url('/') }}" class="no-decoration-link">Aeneid</a> / <span class="no-decoration-link">Text</span>
            </div>
        </div>
    </div>
</div><!--breadcrumbs-->

<div class="divide80"></div>
<div class="container">

    <div class="text-center">
        <h2>The Aeneid</h2>
        <hr>
            <ul class="button-text-page list-inline">
                <li><a href="{{ url('text/1') }}">Book 1</a></li>
                <li><a href="{{ url('text/2') }}">Book 2</a></li>
                <li><a href="{{ url('text/3') }}">Book 3</a></li>
                <li><a href="{{ url('text/4') }}">Book 4</a></li>
                <li><a href="{{ url('text/5') }}">Book 5</a></li>
                <li><a href="{{ url('text/6') }}">Book 6</a></li>
            </ul>
            <ul class="button-text-page list-inline">
                <li><a href="{{ url('text/7') }}">Book 7</a></li>
                <li><a href="{{ url('text/8') }}">Book 8</a></li>
                <li><a href="{{ url('text/9') }}">Book 9</a></li>
                <li><a href="{{ url('text/10') }}">Book 10</a></li>
                <li><a href="{{ url('text/11') }}">Book 11</a></li>
                <li><a href="{{ url('text/12') }}">Book 12</a></li>
            </ul>
    </div>   
</div>
</div>
@stop