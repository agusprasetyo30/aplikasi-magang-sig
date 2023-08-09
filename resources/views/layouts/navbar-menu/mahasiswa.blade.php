<li class="nav-item @if (Request::is('mahasiswa') || Request::is('mahasiswa/download-berkas-magang')) active @endif">
	<a class="nav-link" href="{{ route('mahasiswa.dashboard.index') }}">Dashboard</a>
</li>
<li class="nav-item @if (Request::is('mahasiswa/pengajuan-magang*')) active @endif">
	<a class="nav-link" href="{{ route('mahasiswa.pengajuan-magang.index') }}">Pengajuan Magang</a>
</li>
@if (Auth::user()->pengajuanMagang)
	@if (Auth::user()->pengajuanMagang->status == 1)
	<li class="nav-item @if (Request::is('mahasiswa/upload-berkas*')) active @endif">
		<a class="nav-link" href="{{ route('mahasiswa.upload-berkas.index') }}">Upload Berkas</a>
	</li>
	@endif
@endif

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