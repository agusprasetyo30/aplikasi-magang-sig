<li class="nav-item @if (Request::is('admin')) active @endif">
	<a class="nav-link" href="{{ route('admin.dashboard.index') }}">Dashboard</a>
</li>
<li class="nav-item @if (Request::is('admin/kelola-kuota*')) active @endif">
	<a class="nav-link" href="{{ route('admin.kelola-kuota.index') }}">Kelola Kuota</a>
</li>
<li class="nav-item @if (Request::is('admin/peserta-magang*')) active @endif">
	<a class="nav-link" href="{{ route('admin.peserta-magang.index') }}">Peserta Magang</a>
</li>
<li class="nav-item @if (Request::getRequestUri() == '/admin/jurusan*') active @endif">
	<a class="nav-link" href="{{ route('admin.jurusan.index') }}">Jurusan</a>
</li>
<li class="nav-item @if (Request::getRequestUri() == '/admin/user-management*') active @endif">
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