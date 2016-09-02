@extends('layouts.app')

@section('content')

<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Profile</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Aeneid</a></li>
                    <li>Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="divide80"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6" >
				<h2 class="light">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
				<h3 class="light">Username: {{ Auth::user()->username }}</h3>
			</div>
		</div>
	</div>
</div>

@stop