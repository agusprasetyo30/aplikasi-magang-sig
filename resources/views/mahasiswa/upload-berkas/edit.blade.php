@extends('layouts.app')

@section('title', 'Edit Berkas Pengajuan Magang')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-10">	
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Edit Berkas Pengajuan Magang Mahasiswa</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('mahasiswa.upload-berkas.update', $berkas_pengajuan_magang->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="surat_pernyataan">Upload Surat Pernyataan</label>
									<input type="file" name="surat_pernyataan" id="surat_pernyataan" class="form-control h-100 mb-0 @error('surat_pernyataan') is-invalid @enderror" accept=".pdf" >
									@error('surat_pernyataan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
									<small >* Max size 2 MB | Format: PDF</small> <br>
									<small>File :  
										@if (is_null($berkas_pengajuan_magang->surat_pernyataan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_pengajuan_magang->surat_pernyataan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->surat_pernyataan_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="surat_panggilan">Upload Surat Panggilan yang Sudah di Tanda Tangan</label>
									<input type="file" name="surat_panggilan" id="surat_panggilan" class="form-control h-100 mb-0 @error('surat_panggilan') is-invalid @enderror" accept=".pdf" >
									@error('surat_panggilan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
									<small >* Max size 2 MB | Format: PDF</small> <br>
									<small>File :  
										@if (is_null($berkas_pengajuan_magang->surat_panggilan_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_pengajuan_magang->surat_panggilan_upload_path) }}" title="Klik untuk membuka file">{{ $berkas_pengajuan_magang->surat_panggilan_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="surat_rekomendasi">Upload Surat Persetujuan yang sudah di Tanda Tangan</label>
									<input type="file" name="surat_rekomendasi" id="surat_rekomendasi" class="form-control h-100 mb-0 @error('surat_rekomendasi') is-invalid @enderror" accept=".pdf" >
									@error('surat_rekomendasi')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
									<small >* Max size 2 MB | Format: PDF</small> <br>
									<small>File :  
										@if (is_null($berkas_pengajuan_magang->surat_rekomendasi_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_pengajuan_magang->surat_rekomendasi_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->surat_rekomendasi_file_name }}</a>
										@endif
									</small>
								</div>
								<div class="form-group">
									<label for="ktm">Upload KTM</label>
									<input type="file" name="ktm" id="ktm" class="form-control h-100 mb-0 @error('ktm') is-invalid @enderror" accept=".pdf" >
									@error('ktm')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
									<small >* Max size 2 MB | Format: PDF</small> <br>
									<small>File :  
										@if (is_null($berkas_pengajuan_magang->ktm_upload_path))
											-
										@else
											<a href="{{ asset('storage/' . $berkas_pengajuan_magang->ktm_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->ktm_file_name }}</a>
										@endif
									</small>
								</div>
								
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="surat_sehat">Upload Surat Keterangan Sehat</label>
										<input type="file" name="surat_sehat" id="surat_sehat" class="form-control h-100 mb-0 @error('surat_sehat') is-invalid @enderror" accept=".pdf" >
										@error('surat_sehat')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
										<small >* Max size 2 MB | Format: PDF</small> <br>
										<small>File :  
											@if (is_null($berkas_pengajuan_magang->surat_sehat_upload_path))
												-
											@else
												<a href="{{ asset('storage/' . $berkas_pengajuan_magang->surat_sehat_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->surat_sehat_file_name }}</a>
											@endif
										</small>
									</div>
									<div class="form-group">
										<label for="bpjs">Upload Asuransi Kecelakaan Kerja</label>
										<input type="file" name="bpjs" id="bpjs" class="form-control h-100 mb-0 @error('bpjs') is-invalid @enderror" accept=".pdf" >
										@error('bpjs')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
										<small >* Max size 2 MB | Format: PDF</small> <br>
										<small>File :  
											@if (is_null($berkas_pengajuan_magang->bpjs_upload_path))
												-
											@else
												<a href="{{ asset('storage/' . $berkas_pengajuan_magang->bpjs_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->bpjs_file_name }}</a>
											@endif
										</small>
									</div>
									<div class="form-group">
										<label for="foto">Upload Foto 2 x 3</label>
										<input type="file" name="foto" id="foto" class="form-control h-100 mb-0 @error('foto') is-invalid @enderror" accept=".pdf" >
										@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
										<small >* Max size 2 MB | Format: PDF</small> <br>
										<small>File :  
											@if (is_null($berkas_pengajuan_magang->foto_upload_path))
												-
											@else
												<a href="{{ asset('storage/' . $berkas_pengajuan_magang->foto_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->foto_file_name }}</a>
											@endif
										</small>
									</div>
									<div class="form-group">
										<label for="twibbon">Upload Screenshot Twibbon</label>
										<input type="file" name="twibbon" id="twibbon" class="form-control h-100 mb-0 @error('twibbon') is-invalid @enderror" accept=".pdf" >
										@error('twibbon')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
										<small >* Max size 2 MB | Format: PDF</small> <br>
										<small>File :  
											@if (is_null($berkas_pengajuan_magang->twibbon_upload_path))
												-
											@else
												<a href="{{ asset('storage/' . $berkas_pengajuan_magang->twibbon_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $berkas_pengajuan_magang->twibbon_file_name }}</a>
											@endif
										</small>
								</div>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-12 mb-2">
								<small><b>NOTE</b> : Abaikan jika tidak tidak mengupload / mengupdate data</small>
							</div>
							<div class="col-4">
								<a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
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