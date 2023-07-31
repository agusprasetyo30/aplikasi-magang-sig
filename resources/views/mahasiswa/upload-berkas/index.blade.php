@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	{{-- <div class="row mb-3">
		<div class="col-6">
			<h4>Upload Berkas Mahasiswa</h4>
		</div>
	</div> --}}

	<div class="row justify-content-center">
		<div class="col-md-10">	
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Upload Berkas Mahasiswa</h3>
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="proposal">Upload Surat Pernyataan</label>
									<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf, .jpeg, .jpg, .png">
									<small class="text-danger">* Max size 1 MB | Format: PDF, JPG, PNG, JPEG</small> <br>
									<small>File : <a href="#">Klik untuk membuka file</a></small>
								</div>
								<div class="form-group">
									<label for="proposal">Upload Surat Panggilan yang Sudah di Tanda Tangan</label>
									<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 1 MB | Format: PDF</small> <br>
									<small>File : <a href="#">Klik untuk membuka file</a></small>
								</div>
								<div class="form-group">
									<label for="proposal">Upload Surat Rekomendasi Instansi</label>
									<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
									<small class="text-danger">* Max size 1 MB | Format: PDF</small> <br>
									<small>File : <a href="#">Klik untuk membuka file</a></small>
								</div>
								<div class="form-group">
									<label for="proposal">Upload KTM</label>
									<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf, .jpeg, .jpg, .png">
									<small class="text-danger">* Max size 1 MB | Format: PDF, JPG, PNG, JPEG</small> <br>
									<small>File : <a href="#">Klik untuk membuka file</a></small>
								</div>
								
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="proposal">Upload Surat Keterangan Sehat</label>
										<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
										<small class="text-danger">* Max size 1 MB | Format: PDF</small> <br>
										<small>File : <a href="#">Klik untuk membuka file</a></small>
									</div>
									<div class="form-group">
										<label for="proposal">Upload BPJS</label>
										<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".pdf">
										<small class="text-danger">* Max size 1 MB | Format: PDF</small> <br>
										<small>File : <a href="#">Klik untuk membuka file</a></small>
									</div>
									<div class="form-group">
										<label for="proposal">Upload Foto 2 x 3</label>
										<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".jpeg, .jpg, .png">
										<small class="text-danger">* Max size 1 MB | Format: JPG, PNG, JPEG</small> <br>
										<small>File : <a href="#">Klik untuk membuka file</a></small>
									</div>
									<div class="form-group">
										<label for="proposal">Upload Screenshot Twibbon</label>
										<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0" accept=".jpeg, .jpg, .png">
										<small class="text-danger">* Max size 1 MB | Format: JPG, PNG, JPEG</small> <br>
										<small>File : <a href="#">Klik untuk membuka file</a></small>
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