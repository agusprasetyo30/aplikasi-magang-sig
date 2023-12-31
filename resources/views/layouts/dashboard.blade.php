<!DOCTYPE html>
<html>
	<head>
		<!-- Basic -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Site Metas -->
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="{{ asset('img/sig-logo.png') }}" type="">
		<title>Dashboard</title>
		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/bootstrap.css') }}" />
		<!-- font awesome style -->
		<link href="{{ asset('vendor/css/font-awesome.min.css') }}" rel="stylesheet" />
		<!-- Custom styles for this template -->
		<link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet" />
		<!-- responsive style -->
		<link href="{{ asset('vendor/css/responsive.css') }}" rel="stylesheet" />
		<style>
			a.nav-link{
				font-size: 12px;
			}
		</style>
		@stack('css')
	</head>
	<body>
		<div class="hero_area">
			<!-- header section strats -->
			<header class="header_section">
				@include('layouts._header')
			</header>
			<!-- end header section -->
			<!-- slider section -->
			<section class="slider_section ">
				@include('layouts._slider')
			</section>
			<!-- end slider section -->
		</div>
	
		<!-- footer start -->
		<footer>
			@include('layouts._footer')
		</footer>
		<!-- footer end -->
		<div class="cpy_">
			<p class="mx-auto">© 2023 All Rights Reserved By Semen Indonesia Group			
			</p>
		</div>
		<!-- jQery -->
		<script src="{{ asset('vendor/js/jquery-3.4.1.min.js') }}"></script>
		<!-- popper js -->
		<script src="{{ asset('vendor/js/popper.min.js') }}"></script>
		<!-- bootstrap js -->
		<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
		<!-- custom js -->
		<script src="{{ asset('vendor/js/custom.js') }}"></script>
	</body>
</html>