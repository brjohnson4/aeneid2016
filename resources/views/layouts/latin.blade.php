<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        The Aeneid 
      
    </title>

    
      <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic|Work+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
      <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      /* …curses ios, etc… */
      @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
        body {
          width: 1px;
          min-width: 100%;
          width: 100%;
        }
        #stage {
          height: 1px;
          overflow: auto;
          min-height: 100vh;
          -webkit-overflow-scrolling: touch;
        }
      }
    </style>
  </head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')  

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/all.js') }}"></script>
	<script src="{{ asset('js/side-comments.js') }}"></script>
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
	        url: 'latin/store',
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
<script>
	$(function () {
		$('[data-toggle="popover"]').popover().click(function() {
			var dictionary = $(this).data("dictionary");
			var word = $(this).data("word");
			$.ajax({
				url: 'vocab/store',
				type: 'POST',
				data: { dictionary, word, _token: '{{ csrf_token() }}' }
			});
		});
	})
</script>
</body>
</html>

