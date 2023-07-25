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
		<link rel="shortcut icon" href="{{ asset('vendor/images/favicon.png') }}" type="">
		<title>@yield('title')</title>
		<!-- bootstrap core css -->
		{{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/bootstrap.css') }}" /> --}}
		<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/adminlte.min.css') }}" />
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
			<section class="inner_page_head" style="padding-bottom: 0; padding-top: 10px">

			</section>
			<section class="why_section layout_padding">
				<div class="container">
					{{-- <div class="heading_container heading_center">
						<h2>
							Why Shop With Us
						</h2>
					</div> --}}
						@yield('content')
				</div>
			</section>
		</div>
	
		<!-- footer start -->
		<footer>
			@include('layouts._footer')
		</footer>
		<!-- footer end -->
		<div class="cpy_">
			<p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
			
				Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
			
			</p>
		</div>
		<!-- jQery -->
		<script src="{{ asset('vendor/js/jquery-3.4.1.min.js') }}"></script>
		<!-- popper js -->
		<script src="{{ asset('vendor/js/popper.min.js') }}"></script>
		<!-- bootstrap js -->
		<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
		<!-- custom js -->

	</body>
</html>