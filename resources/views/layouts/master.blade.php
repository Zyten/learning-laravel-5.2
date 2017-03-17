<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ elixir('css/all.css') }}"> <!-- Generates from latest ver based on build/css/rev-manifest.json-->
</head>
<body>
	<div class="container">
	{{-- @include('partials.flash') --}}
	@include('flash::message') <!-- View from package laracasts/flash. Quite similar with the custom partial above -->

	@yield('content')
	</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

	<script>
		//$('#flash-overlay-modal').modal(); // used withflash()->overlay('Your article has been created');
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

@yield('footer')
</body>
</html>