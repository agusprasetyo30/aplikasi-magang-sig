@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>

	</style>
@endpush

@section('content')
	{{-- <h3 class="mb-3"><span>Pengajuan Pagang</span></h3> --}}
	
<div class="row justify-content-center">
	<div class="col-md-8">	
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Pendaftaran Kerja Praktik PT. Semen Gresik Tuban</h3>
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data">
					@csrf
					  
					<div class="form-group">
						<label for="jurusan">Jurusan</label>
						<select name="jurusan" id="jurusan" class="select2 w-100">
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jenjang_pendidikan">Jenjang Pendidikan</label>
						<select name="jenjang_pendidikan" id="jenjang_pendidikan" class="select2 w-100">
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
						</select>
					</div>
					<div class="form-group">
						<label for="tujuan">Tujuan Kerja Praktek</label>
						<textarea class="form-control" name="tujuan" id="tujuan" rows="3" style="min-height: 0"></textarea>
					</div>
					<div class="form-group">
						<label for="periode_awal_kerja">Periode Awal Kerja Praktek</label>
						<select name="periode_awal_kerja" id="periode_awal_kerja" class="select2 w-100">
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
							<option value="">Test</option>
						</select>
					</div>
					<div class="form-group">
						<label for="periode_awal_kerja">Lama Pelaksanaan KP</label>

						<div class="form-group">
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" type="radio" id="1_month" name="lama_pelaksanaan" value="1">
								<label for="1_month" class="custom-control-label font-weight-normal">1 Bulan</label>
								</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" type="radio" id="2_month" name="lama_pelaksanaan" value="2">
								<label for="2_month" class="custom-control-label font-weight-normal">2 Bulan</label>
								</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" type="radio" id="3_month" name="lama_pelaksanaan" value="3">
								<label for="3_month" class="custom-control-label font-weight-normal">3 Bulan</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="proposal">Proposal</label>
						<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0">
						<small class="text-danger">* Max size 1 MB | Format: *pdf</small>
					</div>
					
					<hr>

					<div class="row">
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

@push('js')
	<script>
		$('.select2[name=jurusan]').select2()
		$('.select2[name=jenjang_pendidikan]').select2()
		$('.select2[name=periode_awal_kerja]').select2()
	</script>
@endpush