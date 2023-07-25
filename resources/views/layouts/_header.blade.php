<div class="container">
	<nav class="navbar navbar-expand-lg custom_nav-container ">
		<a class="navbar-brand" href="index.html"><img width="250" src="{{ asset('vendor/images/logo.png') }}" alt="#" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class=""> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				{{-- <li class="nav-item @if (Request::getRequestUri() == '/') active @endif">
					<a class="nav-link" href="{{ route('dashboard') }}">Beranda <span class="sr-only">(current)</span></a>
				</li> --}}
				<li class="nav-item dropdown ">
					@auth
						{{-- <li class="nav-item @if (Request::getRequestUri() == '/pengajuan-magang') active @endif">
							<a class="nav-link" href="{{ route('mahasiswa.pengajuan-magang.index') }}">Pengajuan Magang</a>
						</li> --}}

						<li class="nav-item @if (Request::getRequestUri() == '/admin/') active @endif">
							<a class="nav-link" href="{{ route('admin.dashboard.index') }}">Dashboard</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/admin/kelola-kuota') active @endif">
							<a class="nav-link" href="{{ route('admin.kelola-kuota.index') }}">Kelola Magang</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/admin/peserta-magang') active @endif">
							<a class="nav-link" href="{{ route('admin.peserta-magang.index') }}">Peserta Magang</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/admin/upload-twibbon') active @endif">
							<a class="nav-link" href="{{ route('admin.upload-twibbon.index') }}">Upload Twibbon</a>
						</li>
						<li class="nav-item @if (Request::getRequestUri() == '/admin/user-management') active @endif">
							<a class="nav-link" href="{{ route('admin.user-management.index') }}">User Management</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">hi, {{ explode(" ", Auth::user()->fullname)[0] }} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>							
									<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
								</li>
							</ul>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
							@csrf
						</form>
					@else
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