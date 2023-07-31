@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row">
		<div class="col-3">
			<div class="card">
				<div class="card-body bg-primary">
					<span><i class="fa fa-info-circle"></i> Info</span>
					<p class="mt-2">Lengkapi profil anda dengan menambahkan foto anda, agar kami mengetahui siapa anda</p>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card">
				<div class="card-body bg-primary">
					<span><i class="fa fa-info-circle"></i> Selamat datang di panel Mahasiswa</span>
					<p class="mt-2">Untuk memulai pengajuan magang silahkan menuju di menu <i>Pengajuan Magang</i>. Kemudian isi data-data lengkap beserta foto surat pengantar dari kampus
					dan jika sudah selesai mengisi form tekan tombol submit lalu kami akan melakukan tahap verifikasi</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<div class="card card-primary card-outline">
				<div class="card-body">
					<div class="row ">
						<div class="col-12">
							<div class="text-center">
								<i class="fa fa-user-circle-o text-gray mb-2" style="font-size: 120px"></i>
								<h5>Nama Mahasiswa</h5>
								<p class="text-gray">Mahasiswa</p>
							</div>

							<hr>

							<div class="form-group">
								<label for="upload_foto">Upload</label>
								<input type="file" name="upload_foto" id="upload_foto" class="form-control h-100 mb-0" >

							</div>
							<button type="submit" class="btn btn-primary btn-block">Update Foto</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-edit mr-2"></i>History Pengajuan Terakhir</h5>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td width="5%">No</td>
								<td width="25%">Nama</td>
								<td width="10%">NIM</td>
								<td width="35%">Universitas</td>
								<td width="15%">Tanggal Pengajuan</td>
								<td width="10%">Status</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Melkan Santoso</td>
								<td>1721640002</td>
								<td>Politeknik Elektronika Negeri Surabaya</td>
								<td>08 Jul 2023</td>
								<td>
									<span class="badge badge-primary">DISETUJUI</span>
									<span class="badge badge-warning">PENDING</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection