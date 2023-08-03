@extends('layouts.app')

@section('title', 'Download Berkas Magang')

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
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
						</div>
						<div class="form-group">
							<label for="proposal">Surat Persetujuan</label>
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
						</div>
						<div class="form-group">
							<label for="proposal">Lampiran Surat Panggilan</label>
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="proposal">Absensi</label>
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
						</div>
						<div class="form-group">
							<label for="proposal">ID Card</label>
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
						</div>
						<div class="form-group">
							<label for="proposal">Form Bimbingan</label>
							<a href="#" class="btn btn-primary btn-block"><i class="fa fa-download mr-2"></i> Download File</a>
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