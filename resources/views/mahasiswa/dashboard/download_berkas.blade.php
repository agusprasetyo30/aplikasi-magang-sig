@extends('layouts.app')

@section('title', 'Download Berkas Magang')

@push('css')
	<style>
		.info-file-empty {
			color: #fff!important;
			background-color: #6c757d!important;
			padding: .5rem!important;
			font-size: 13px;
		}
	</style>
@endpush

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">	
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Download Berkas Keperluan Magang</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="proposal">Surat Panggilan</label>
							@if (is_null($berkas_peserta_magang->surat_panggilan_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'surat-panggilan') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
						<div class="form-group">
							<label for="proposal">Lampiran Surat Panggilan</label>
							@if (is_null($berkas_peserta_magang->lampiran_surat_panggilan_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'lampiran-surat-panggilan') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
						<div class="form-group">
							<label for="proposal">Surat Persetujuan</label>
							@if (is_null($berkas_peserta_magang->surat_persetujuan_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'surat-persetujuan') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="proposal">Absensi</label>
							@if (is_null($berkas_peserta_magang->absensi_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'absensi') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
						<div class="form-group">
							<label for="proposal">ID Card</label>
							@if (is_null($berkas_peserta_magang->id_card_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'id-card') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
						<div class="form-group">
							<label for="proposal">Form Bimbingan</label>
							@if (is_null($berkas_peserta_magang->form_bimbingan_upload_path))
								<div class="info-file-empty">
									Harap menunggu, File belum diupload oleh admin
								</div>
							@else
								<a class="btn btn-primary btn-block" href="{{ route('mahasiswa.dashboard.download-file', 'form-bimbingan') }}" title="Klik untuk membuka file"><i class="fa fa-download mr-2"></i>Download File</a>
							@endif
						</div>
					</div>
				</div>
				<hr>
				<a href="{{ route('mahasiswa.dashboard.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left mr-2"></i> Kembali</a>
			</div>
		</div>
	</div>
</div>
@endsection