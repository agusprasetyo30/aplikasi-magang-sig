@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Upload Data Mahasiswa : <b>{{ $peserta_magang->name }}</b></h3>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.peserta-magang.upload-data', $peserta_magang->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="proposal">Surat Panggilan</label>
									<input type="file" name="surat_panggilan" id="surat_panggilan" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 2 MB | Format: PDF</small> <br>
									<small>File :
										@if (is_null($berkas_peserta_magang->surat_panggilan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->surat_panggilan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->surat_panggilan_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="proposal">Lampiran Surat Panggilan</label>
									<input type="file" name="lampiran_surat_panggilan" id="lampiran_surat_panggilan" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 2 MB | Format: PDF</small><br>
									<small>File :
										@if (is_null($berkas_peserta_magang->lampiran_surat_panggilan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->lampiran_surat_panggilan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->lampiran_surat_panggilan_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="proposal">Surat Persetujuan</label>
									<input type="file" name="surat_persetujuan" id="surat_persetujuan" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 2 MB | Format: PDF</small><br>
									<small>File :
										@if (is_null($berkas_peserta_magang->surat_persetujuan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->surat_persetujuan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->surat_persetujuan_file_name }}</a>
										@endif
									</small>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="proposal">Absensi</label>
									<input type="file" name="absensi" id="absensi" class="form-control h-100 mb-0" accept=".pdf, .xlsx">
									<small class="text-danger">* Max size 2 MB | Format: PDF, XLSX (Excel)</small><br>
									<small>File :
										@if (is_null($berkas_peserta_magang->absensi_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->absensi_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->absensi_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="proposal">ID Card</label>
									<input type="file" name="id_card" id="id_card" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 2 MB | Format: PDF</small><br>
									<small>File :
										@if (is_null($berkas_peserta_magang->id_card_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->id_card_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->id_card_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="proposal">Form Bimbingan</label>
									<input type="file" name="form_bimbingan" id="form_bimbingan" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 2 MB | Format: PDF</small><br>
									<small>File :
										@if (is_null($berkas_peserta_magang->form_bimbingan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_peserta_magang->form_bimbingan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_peserta_magang->form_bimbingan_file_name }}</a>
										@endif
									</small>
								</div>
							</div>
						</div>

						<small class="p-1 bg-info" style="border-radius: 5px"><b>Last Update By</b> : {{ ($upload_by->name ?? '') . ' - ' . ($upload_by->datetime ?? '') }}</small>
						<hr>

						<div class="row">
							<div class="col-4">
								<a href="{{ route('admin.peserta-magang.index') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
							</div>
							<div class="col-8 text-right">
								<button type="reset" class="btn btn-secondary btn-sm"><i class="fa fa-undo mr-1"></i>Reset</button>
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send mr-1"></i>Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

