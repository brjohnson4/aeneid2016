@extends('layouts.app')

@section('content')


<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Leaders</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Aeneid</a></li>
                    <li>Leaders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="divide80"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#leaders" data-toggle="tab">Leaders</a></li>
                    <li><a href="#grammar" data-toggle="tab">Grammar</a></li>
                    <li><a href="#trans" data-toggle="tab">Translation</a></li>
                    <li><a href="#comp" data-toggle="tab">Comprehension</a></li>
                    <li><a href="#ref" data-toggle="tab">Reference</a></li>
                    <li><a href="#fos" data-toggle="tab">Figures of Speech</a></li>
                    <li><a href="#meter" data-toggle="tab">Meter</a></li>
                    <li><a href="#back" data-toggle="tab">Background</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="leaders">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @foreach ($leaders as $leader)
		                        <tr><td scope="row">{{ $leader->rank }}</td><td>{{ $leader->firstname }} {{$leader->lastname}}</td><td>{{ $leader->xp }}</td</tr>
		                        @endforeach
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="grammar">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
								@if($grammar)
		                        @foreach ($grammar as $gramm)
		                        <tr><td scope="row">{{ $gramm->rank }}</td><td>{{ $gramm->firstname }} {{ $gramm->lastname }}</td><td>{{ $gramm->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="trans">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if($translation)
		                        @foreach ($translation as $trans)
		                        <tr><td scope="row">{{ $trans->rank}}</td><td>{{ $trans->firstname }} {{ $trans->lastname }}</td><td>{{ $trans->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="comp">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if ($comprehension)
		                        @foreach ($comprehension as $comp)
		                        <tr><td scope="row">{{ $comp->rank}}</td><td>{{ $comp->firstname }} {{ $comp->lastname }}</td><td>{{ $comp->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="ref">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if($reference)
		                        @foreach ($reference as $ref)
		                        <tr><td scope="row">{{ $ref->rank }}</td><td>{{ $ref->firstname }} {{ $ref->lastname }}</td><td>{{ $ref->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="fos">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if($fos)
		                        @foreach ($fos as $fo)
		                        <tr><td scope="row">{{ $fo->rank }}</td><td>{{ $fo->firstname }} {{ $fo->lastname }}</td><td>{{ $fo->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="meter">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if($meter)
		                        @foreach ($meter as $hex)
		                        <tr><td scope="row">{{ $hex->rank }}</td><td>{{ $hex->firstname }} {{ $hex->lastname }}</td><td>{{ $hex->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="back">
                        <div class="tab-desc animated fadeIn">
							<table class="table table-condensed">
								<tbody>
		                        @if($background)
		                        @foreach ($background as $back)
		                        <tr><td scope="row">{{ $back->rank }}</td><td>{{ $back->firstname }} {{ $back->lastname }}</td><td>{{ $back->xp }}</td</tr>
		                        @endforeach
		                        @else
		                        <h3 class="light">Not enough attempts</h3>
		                        @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

@stop
