@extends('layouts.app')

@section('title', 'Pusat Informasi')

@push('css')
	<style>
		/* .accordion{overflow-anchor:none}.accordion>.card{overflow:hidden}.accordion>.card:not(:last-of-type){border-bottom:0;border-bottom-right-radius:0;border-bottom-left-radius:0}.accordion>.card:not(:first-of-type){border-top-left-radius:0;border-top-right-radius:0}.accordion>.card>.card-header{border-radius:0;margin-bottom:0} */
	</style>
@endpush

@section('content')
	<h3 class="mb-3"><span>Pusat Informasi</span></h3>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div id="accordion">
						<div class="card card-danger">
						<div class="card-header">
							<h4 class="card-title w-100">
								
								<a class="d-block w-100" data-toggle="collapse" href="#collapse1" title="klik untuk menampilkan informasi">
									1.	Bagaimana cara mendaftar PKL?
							</a>
							</h4>
						</div>
						<div id="collapse1" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Masuk ke halaman daftar, jika belum memiliki akun wajib register terlebih dahulu. Isi data pada form registrasi yaitu nama lengkap, email, password, dan konfirmasi password.
							</div>
						</div>
						</div>
						<div class="card card-danger">
						<div class="card-header">
							<h4 class="card-title w-100">
								
								<a class="d-block w-100" data-toggle="collapse" href="#collapse2" title="klik untuk menampilkan informasi">
									2.	Bagaimana untuk memulai pengajuan PKL?
							</a>
							</h4>
						</div>
						<div id="collapse2" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Masuk ke halaman Pengajuan Magang. Isi data-data yang tertera beserta unggah file proposal, cv, dan surat pengantar.
							</div>
						</div>
						</div>
						<div class="card card-danger">
						<div class="card-header">
							<h4 class="card-title w-100">
								
								<a class="d-block w-100" data-toggle="collapse" href="#collapse3" title="klik untuk menampilkan informasi">
									3.	Berapa lama proses verifikasi pengajuan PKL?
							</a>
							</h4>
						</div>
						<div id="collapse3" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Proses pengajuan PKL akan dilakukan oleh admin kurang lebih 1 minggu setelah pengisian data Pengajuan Magang.
							</div>
						</div>
						</div>
						<div class="card card-danger">
						<div class="card-header">
							<h4 class="card-title w-100">
								
								<a class="d-block w-100" data-toggle="collapse" href="#collapse4" title="klik untuk menampilkan informasi">
									4.	Bagaimana cara mengetahui pengajuan PKL saya diterima/ditolak?
							</a>
							</h4>
						</div>
						<div id="collapse4" class="collapse" data-parent="#accordion">
							<div class="card-body">
								Silahkan login, setelah itu lihat pada halaman Dashbord. Status diterima/ditolak akan muncul pada halaman Dashbord. Jika diterima, silahkan langsung melengkapi file yang ada pada halaman “Unggah Berkas”.
							</div>
						</div>
						</div>
				
					</div>
		<!-- /.card -->
				</div>
			</div>	
		</div>
		<!-- /.col -->
	</div>
@endsection