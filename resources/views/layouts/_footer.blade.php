<div class="container">
	<div class="row">
	<div class="col-md-6">
		<div class="full">
			<div class="widget_menu">
				<h3>PT Semen Indonesia (Persero) Tbk</h3>
			</div>
			<div class="logo_footer">
				<a href="#"><img width="80" src="{{ asset('img/sig-logo.png') }}" alt="#" /></a>
			</div>
			<div class="information_f">
				<ul class="pl-4">
					<li>Jl. R.A Kartini Kav.8 Cilandak Barat, Jakarta Selatan DKI Jakarta, 12430</li>
					<li>Jl. Veteran, Kabupaten Gresik, Jawa Timur, 61112</li>
					<li>Desa Sumberarum, Kecamatan Kerek, Kabupaten Tuban, 62356</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="widget_menu">
							<h3>Menu</h3>
							<ul>
							@auth
								@can('mahasiswa')
									<li><a href="{{ route('mahasiswa.dashboard.index') }}">Dashboard</a></li>
									<li><a href="{{ route('mahasiswa.pengajuan-magang.index') }}">Pengajuan Magang</a></li>
									<li><a href="{{ route('mahasiswa.upload-berkas.index') }}">Upload Berkas</a></li>
								@elsecan('admin')
									<li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
									<li><a href="{{ route('admin.kelola-kuota.index') }}">Kelola Kuota</a></li>
									<li><a href="{{ route('admin.peserta-magang.index') }}">Peserta Magang</a></li>
									<li><a href="{{ route('admin.jurusan.index') }}">Jurusan</a></li>
									<li><a href="{{ route('admin.user-management.index') }}">User Management</a></li>
								@endcan
							@else
								<li><a href="{{ route('dashboard') }}">Beranda</a></li>
								<li><a href="{{ route('tentang-sig.index') }}">Tentang SIG</a></li>
								<li><a href="{{ route('kuota-magang.index') }}">Kuota Magang</a></li>
								<li><a href="{{ route('pusat-informasi.index') }}">Pusat Informasi</a></li>
							@endauth
							
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget_menu">
							<h3>Sosial Media</h3>
								<a href="#"><i class="fa fa-3x fa-instagram text-dark"></i></a>
								<a href="#"><i class="fa fa-3x fa-facebook-official text-dark"></i></a>
								<a href="#"><i class="fa fa-3x fa-twitter-square text-dark"></i></a>
								<a href="#"><i class="fa fa-3x fa-youtube-square text-dark"></i></a>
						</div>
					</div>
				</div>
			</div>     
		</div>
	</div>
	</div>
</div>