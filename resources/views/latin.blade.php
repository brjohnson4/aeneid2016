<!DOCTYPE html>
<html>
    <head>
        <title>Aeneid.co</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- custom css (blue color by default) -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="screen">
       
        <!-- font awesome for icons -->
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- flex slider css -->
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen">
        <!-- animated css  -->
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" media="screen">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="screen">
        <link href="{{ asset('sky-form/css/sky-forms.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('side-comments/side-comments.css') }}" />
		<link rel="stylesheet" href="{{ asset('side-comments/default-theme.css') }}" />

    </head>
    <body>
	    
@include('includes.header')

@yield('content')

<div class="divide60"></div>

@include('includes.footer')

<script src="{{ asset('side-comments/side-comments.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
	  var existingComments = {!! $notes !!};
      var SideComments = require('side-comments');
	  var currentUser = {
		  "id": "{{ Auth::user()->id }}",
		  "name": "{{ Auth::user()->firstname }}",
		};
      var sideComments = new SideComments('#commentable-container', currentUser, existingComments);
      sideComments.on('commentPosted', function( comment ) {
        comment.id = parseInt(Math.random() * (100000 - 1) + 1);
	    $.ajax({
	        url: '',
	        type: 'POST',
	        data: { comment, _token: '{{ csrf_token() }}' },
	        success: function( savedComment ) {
	            // Once the comment is saved, you can insert the comment into the comment stream with "insertComment(comment)".
	            sideComments.insertComment(comment);
	        }
    	});
      });
      sideComments.on('commentDeleted', function( commentId ) {
	    $.ajax({
		    url: 'latin/delete',
		    type: 'DELETE',
		    data: {commentId, _token: '{{ csrf_token() }}' },
		    success: function( success ) {
			sideComments.removeComment(commentId.sectionId, commentId.id);
		    }
	    });
      });
    });
  </script>


    </body>
</html>
