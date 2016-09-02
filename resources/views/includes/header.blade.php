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

<div class="block block-fill-height app-header">
	     
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

