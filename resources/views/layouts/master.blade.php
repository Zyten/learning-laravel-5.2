<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	
	<link rel="stylesheet" href="{{ elixir('css/all.css') }}"> <!-- Generates from latest ver based on build/css/rev-manifest.json-->
</head>
<body>
	@include('partials.nav')

	<div class="container">
	{{-- @include('partials.flash') --}}
	@include('flash::message') <!-- View from package laracasts/flash. Quite similar with the custom partial above -->

	@yield('content')
	</div>

    <!-- JavaScripts -->
    <script src="{{ elixir('js/all.js') }}"></script>
	<script>
		//$('#flash-overlay-modal').modal(); // used with flash()->overlay('Your article has been created');
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>

@yield('footer')
</body>
</html>