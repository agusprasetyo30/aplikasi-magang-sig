@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	{{-- <div class="row mb-3">
		<div class="col-6">
			<h4>Upload Data</h4>
		</div>
	</div> --}}

	<div class="row justify-content-center">
		<div class="col-md-8">	
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Upload Data Mahasiswa : <b>Melkan Santoso</b></h3>
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="proposal">Surat Panggilan</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small> <br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						<div class="form-group">
							<label for="proposal">Surat Persetujuan</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small><br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						<div class="form-group">
							<label for="proposal">Lampiran Surat Panggilan</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small><br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						<div class="form-group">
							<label for="proposal">Absensi</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small><br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						<div class="form-group">
							<label for="proposal">ID Card</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small><br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						<div class="form-group">
							<label for="proposal">Form Bimbingan</label>
							<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
							<small class="text-danger">* Max size 1 MB | Format: PDF</small><br>
							<small>File : <a href="#">Klik untuk membuka file</a></small>
						</div>
						
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