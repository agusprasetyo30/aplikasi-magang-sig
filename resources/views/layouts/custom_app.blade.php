<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<!-- Link Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.css') }}">
	<style>
	body,
	html {
		height: 100%;
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100%;
	}
	</style>

	@stack('css')
</head>

<body>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{ asset('vendor/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
	@stack('js')
</body>

</html>
