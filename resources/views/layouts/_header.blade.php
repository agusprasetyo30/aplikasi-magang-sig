<div class="container">
	<nav class="navbar navbar-expand-lg custom_nav-container ">
		@auth
			@can('mahasiswa')
				<a class="navbar-brand" href="{{ route('mahasiswa.dashboard.index') }}"><img width="80" src="{{ asset('img/sig-logo.png') }}" alt="#" /></a>
			@elsecan('admin')
				<a class="navbar-brand" href="{{ route('admin.dashboard.index') }}"><img width="80" src="{{ asset('img/sig-logo.png') }}" alt="#" /></a>
			@endcan

		@else
			<a class="navbar-brand" href="{{ route('dashboard') }}"><img width="80" src="{{ asset('img/sig-logo.png') }}" alt="#" /></a>
		@endauth

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class=""> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				
				<li class="nav-item dropdown ">
					@auth
						@can('mahasiswa')
							@include('layouts.navbar-menu.mahasiswa')

						@elsecan('admin')
							@include('layouts.navbar-menu.admin')
						@endcan

					@else
						<li class="nav-item @if (Request::getRequestUri() == '/') active @endif">
							<a class="nav-link" href="{{ route('dashboard') }}">Beranda <span class="sr-only">(current)</span></a>
						</li>
						<!--Digunakan untuk user yang belum login-->
						<li class="nav-item @if (Request::getRequestUri() == '/tentang-sig') active @endif">
							<a class="nav-link" href="{{ route('tentang-sig.index') }}">Tentang SIG</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/kuota-magang') active @endif">
							<a class="nav-link" href="{{ route('kuota-magang.index') }}">Kuota Magang</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/pusat-informasi') active @endif">
							<a class="nav-link" href="{{ route('pusat-informasi.index') }}">Pusat Informasi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">Register</a>
						</li>
					@endauth

					{{-- @endif --}}
				</li>
			</ul>
		</div>
	</nav>
	</div>