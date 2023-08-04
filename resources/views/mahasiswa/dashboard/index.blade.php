@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

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
								<div class="overflow-hidden mb-3">
									@if (is_null(Auth::user()->photo_upload_path))
										<i class="fa fa-user-circle-o text-gray mb-2" style="font-size: 120px"></i>
									@else
										<img class="profile-user-img img-fluid img-fit-cover img-circle w-100 h-100" src="{{ asset('storage/' . Auth::user()->photo_upload_path) }}" alt="User profile picture">
									@endif
								</div>	
								<h5>{{ Auth::user()->pengajuanMagang->name ?? Auth::user()->fullname }}</h5>
								<p class="text-gray">Mahasiswa</p>
							</div>

							<hr>

							<form action="{{ route('mahasiswa.dashboard.upload-photo') }}" method="post" enctype="multipart/form-data">
								@csrf
								@method('put')
								<div class="form-group">
									<label for="upload_foto">Upload</label>
									<input type="file" name="upload_foto" id="upload_foto" class="form-control h-100 mb-0" accept="image/*">
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Update Foto</button>
							</form>
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
					<a href="{{ route('mahasiswa.dashboard.download-berkas-magang') }}" class="btn btn-success btn-sm mb-3"><i class="fa fa-file-text mr-2"></i> Download Berkas Magang</a>
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
							@foreach ($pengajuan_magang as $item)
								<tr>
									<td>{{ $number++ }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->nim }}</td>
									<td>{{ $item->instansi }}</td>
									<td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
									<td>
										@switch($item->status)
											@case(0)
												<span class="badge badge-warning">PENDING</span>
												
												@break
											@case(1)
												<span class="badge badge-primary">DISETUJUI</span>
												
												@break
											@case(2)
												<span class="badge badge-danger">DITOLAK</span>
												
												@break
												
										@endswitch
									</td>
								</tr>
							@endforeach

							@empty($pengajuan_magang)
								<tr>
									<td colspan="6">Data Kosong</td>
								</tr>
							@endempty
							
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" align="center">
									{{ $pengajuan_magang->appends(Request::all())->links()}}
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection