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
	@yield('content')
	</div>
@yield('footer')
</body>
</html>