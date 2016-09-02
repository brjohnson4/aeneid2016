@extends('layouts.welcome')

@section('content')

<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
  <ul class="nav nav-bordered nav-stacked">
    <li class="nav-header">The Aeneid</li>
    <li class="active">
      <a href="{{ url('/') }}">Home</a>
    </li>
    <li>
      <a href="{{ url('text') }}">The Text</a>
    </li>
    <li>
      <a href="{{ url('videos') }}">Videos</a>
    </li>
    <li>
      <a href="{{ url('series') }}">Series</a>
    </li>
    <li class="nav-divider"></li>
    <li class="nav-header">More</li>
    <li>
      <a href="{{ url('about') }}">About</a>
    </li>
    <li>
      <a href="http://hexameter.co">Hexameter.co</a>
    </li>
  </ul>
</div>

<div class="stage" id="stage">

<div class="block block-inverse block-fill-height app-header"
     style="background-image: url({{ asset('img/trojanhorse.jpg')}});">
	     
<nav class="navbar navbar-default navbar-fixed-top navbar-padded app-navbar p-t-md">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed p-x-0"
              data-target="#stage" data-toggle="stage" data-distance="-250">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">
        <strong style="color: black;">
          The Aeneid
        </strong>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-left">
        <li >
          <a href="{{ url('text') }}">The Text</a>
        </li>
        <li >
          <a href="{{ url('videos') }}">Videos</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-hover="dropdown" href="{{ url('series') }}" role="button" aria-haspopup="true" aria-expanded="false">Series <span class="caret"></span></a>
          <ul class="dropdown-menu">
	          @foreach ($series as $link)
			  	<li><a href="{{ url('series', $link->urlSlug) }}">{{ $link->title }}: {{ $link->subTitle }}</a></li>
			  @endforeach
          </ul>
        </li>
        <li >
          <a href="">More</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	      @if (Auth::check())
	      <li class="dropdown">
	      	<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon icon-user"></span> {{ Auth::user()->username }}  <span class="caret"></span></a>
  	        <ul class="dropdown-menu">
	  	        <li><a href="{{ url('profile') }}">Profile</a></li>
	  	        <li><a href="{{ url('logout') }}">Logout</a></li>
  	        </ul>
	      </li>
	      @else
	      <li>
	      	<a href="{{ url('login') }}">Login</a>
	      </li>
	      <li>
	      	<a href="{{ url('register') }}">Register</a>
	      </li>
	      @endif

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>



  <div class="block-xs-middle p-b-lg">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-6">
          <h1 class="block-title m-b-sm" style="color:black">The Story of Aeneas and Rome</h1>
          <p class="lead m-b-md text-muted" style="color:black">Aeneid.co provides you with the tools necessary to read and understand the great work of Vergil.</p>
          <button class="btn btn-primary btn-lg">Try it now</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="block block-secondary app-iphone-block">
  <div class="container">
    <div class="row app-align-center">

      <div class="col-sm-5 hidden-xs">
        <img class="app-iphone" src="assets/img/startup-2.jpg" style="width: 100%;">
      </div>

      <div class="col-sm-6 col-sm-offset-1">
        <h6 class="text-muted text-uppercase">Rich Information</h6>
        <h3 class="m-t-0">Make informed decisions with historical & real time data.</h3>
        <p class="lead m-b-md">We combine immediate real time events with rich historical data to help answer the toughest questions about retention, growth, and engagement.</p>
        <div class="row hidden-sm">
          <div class="col-sm-6 m-b-md">
            <h5 class="m-y-0">Data frequency</h5>
            <p>We poll for data on a millisecond basis. You can react to new information in seconds rather than days. <a href="#" class="text-primary">Learn more.</a></p>
          </div>
          <div class="col-sm-6">
            <h5 class="m-y-0">Reliability & uptime</h5>
            <p>We process our data across a massively distributed network of reliable servers to ensure 99.99% uptime, always. <a href="#" class="text-primary">Learn more</a>.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="block block-inverse block-secondary app-code-block">
  <div class="container">
    <div class="row app-align-center">
      <div class="col-sm-5 col-sm-push-7">
        <pre class="app-code">
<span>1</span> <span class="hidden-xs">goAnalytics</span> “who are the latest 3 users?”
<span>2</span>
<span>3</span>  {
<span>4</span>    "Dave": {
<span>5</span>      "fullName": "Dave Gamache",
<span>6</span>      "twitterHandle": "@dhg",
<span>7</span>    }
<span>8</span>    "Mark": {
<span>9</span>      "fullName": "Mark Otto",
<span>10</span>      "twitterHandle": "@mdo",
<span>11</span>    }
<span>12</span>    "Jacob": {
<span>13</span>      "fullName": "Jacob Thornton",
<span>14</span>      "twitterHandle": "@fat",
<span>15</span>    }
<span>16</span>  }</pre>
      </div>

      <div class="col-sm-6 col-sm-pull-5">
        <h6 class="text-muted text-uppercase">Easy development</h6>
        <h3 class="m-t-0">Natural language queries make mining data easy for anyone.</h3>
        <p class="lead m-b-md text-muted">Rather than force everyone at your company to learn incredibly difficult terminal commands, we allow anyone to query the data with natural language to return data.</p>
        <button class="btn btn-default btn-lg btn-borderless">
          Read our docs
        </button>
      </div>
    </div>
  </div>
</div>

<div class="block block-secondary app-high-praise p-b-0">
  <div class="container">
    <div class="row app-align-center">
      <div class="col-sm-5 col-sm-push-7">
        <h6 class="text-muted text-uppercase">High Praise</h6>
        <h3 class="m-t-0 m-b-md">“Go Analytics is amazing. Decisions that used to take weeks, now only takes minutes and is available to everyone on my team.”</h3>
        <p class="m-b-md text-muted">Cindy Smith, founder of Cool Startup</p>
      </div>
      <div class="col-sm-6 col-sm-pull-5">
        <img src="assets/img/startup-3.jpg">
      </div>
    </div>
  </div>
</div>

<div class="block app-ribbon p-y-lg">
  <div class="container text-center">
    <img src="assets/img/startup-4.svg">
    <img src="assets/img/startup-5.svg">
    <img src="assets/img/startup-6.svg">
    <img src="assets/img/startup-7.svg">
    <img src="assets/img/startup-8.svg">
  </div>
</div>

<div class="block block-secondary app-block-marketing-grid">
  <div class="container text-center">

    <div class="row m-b-lg">
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <h6 class="text-muted text-uppercase">Inside the machine</h6>
        <h3  class="m-t-0 m-b">It’s not hard to see how we make your life easier every day.</h3>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-9.svg">
        <p><strong>24/7 support.</strong> We’re always here for you no matter what time of day.</p>
      </div>
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-10.svg">
        <p><strong>E-commerce.</strong> We automatically handle all sales analytics.</p>
      </div>
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-11.svg">
        <p><strong>Turnaround.</strong> Our data analysis is distributed, so it processes in seconds.</p>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-12.svg">
        <p><strong>Rich calculations.</strong> Limitless ways to splice and dice your data.</p>
      </div>
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-13.svg">
        <p><strong>Mobile apps.</strong> iOS and Android apps available for monitoring.</p>
      </div>
      <div class="col-sm-4 p-x-md m-b-lg">
        <img class="m-b" src="assets/img/startup-14.svg">
        <p><strong>Secure connections.</strong> Every single request is routed through HTTPS.</p>
      </div>
    </div>
  </div>
</div>

<div class="block app-price-plans">
  <div class="container text-center">

    <div class="row m-b-lg">
      <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <h6 class="text-muted text-uppercase">Business Talk</h6>
        <h3  class="m-t-0">No plans. We just bump your plan whenever you need it.</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4 p-x m-b-lg">
        <div class="p-x">
          <h6 class="text-muted text-uppercase m-b">Personal</h6>
          <img class="m-b" src="assets/img/startup-15.svg">
          <p>Plenty of processing power for any personal projects, big or small.</p>
        </div>

        <ul class="list-unstyled list-bordered text-left m-y-md">
          <li class="p-y"><strong>10k</strong> monthly requests</li>
          <li class="p-y"><strong>9am-5pm</strong> technical supprt</li>
          <li class="p-y"><strong>Public</strong> API access</li>
        </ul>

        <button class="btn btn-lg btn-primary btn-block">
          Start <span class="visible-lg-inline">a personal account</span>
        </button>
      </div>

      <div class="col-sm-4 p-x m-b-lg">
        <div class="p-x">
          <h6 class="text-muted text-uppercase m-b">Business</h6>
          <img class="m-b" src="assets/img/startup-16.svg">
          <p>The perfect sized plan for small businesses to get started.</p>
        </div>

        <ul class="list-unstyled list-bordered text-left m-y-md">
          <li class="p-y"><strong>100k</strong> monthly requests</li>
          <li class="p-y"><strong>24/7</strong> technical supprt</li>
          <li class="p-y"><strong>Public</strong> API access</li>
        </ul>

        <button class="btn btn-lg btn-primary btn-block">
          Start <span class="visible-lg-inline">a business account</span>
        </button>
      </div>

      <div class="col-sm-4 p-x m-b-lg">
        <div class="p-x">
          <h6 class="text-muted text-uppercase m-b">Corporate</h6>
          <img class="m-b" src="assets/img/startup-17.svg">
          <p>An unlimited plan that will scale infinitely to any size project.</p>
        </div>

        <ul class="list-unstyled list-bordered text-left m-y-md">
          <li class="p-y"><strong>Unlimited</strong> monthly requests</li>
          <li class="p-y"><strong>24/7</strong> technical supprt</li>
          <li class="p-y"><strong>Public & Private</strong> API access</li>
        </ul>

        <button class="btn btn-lg btn-primary btn-block">
          Start <span class="visible-lg-inline">a corporate account</span>
        </button>
      </div>
    </div>

  </div>
</div>

@stop
