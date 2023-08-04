@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>

	</style>
@endpush

@section('content')
	{{-- <h3 class="mb-3"><span>Pengajuan Pagang</span></h3> --}}
	
<div class="row justify-content-center">
	<div class="col-md-12">	
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-paperclip mr-2"></i>Pendaftaran Kerja Praktik PT. Semen Gresik Tuban</h3>
			</div>
			<div class="card-body">
				<form action="{{ route('mahasiswa.pengajuan-magang.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="instansi">Nama</label>
								<input type="text" class="form-control" name="name" id="name" value="{{ old('nama') }}" required>
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control" name="nim" id="nim" value="{{ old('nim') }}" required>
							</div>
							<div class="form-group">
								<label for="instansi">Instansi</label>
								<input type="text" class="form-control" name="instansi" id="instansi" value="{{ old('instansi') }}" required>
							</div>
							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<select name="jurusan" id="jurusan" class="select2 w-100" required data-jurusan-select2="{{ route('select2.jurusan') }}"></select>
							</div>
							<div class="form-group">
								<label for="jenjang_pendidikan">Jenjang Pendidikan<x-required/></label>
								<select name="jenjang_pendidikan" id="jenjang_pendidikan" class="select2 w-100" required>
									<option value="">Pilih Jenjang Pendidikan</option>
									<option value="SMA">SMA / SMK</option>
									<option value="D1">D1</option>
									<option value="D2">D2</option>
									<option value="D3">D3</option>
									<option value="S1">D4 / S1</option>
									<option value="S2">S2</option>
									<option value="S3">S3</option>
								</select>
							</div>
							<div class="form-group">
								<label for="rekomendasi">Rekomendasi <x-optional/></label>
								<input type="text" class="form-control" name="rekomendasi" id="rekomendasi" value="{{ old('rekomendasi') }}">
							</div>
							<div class="form-group">
								<label for="jumlah_total_kelompok">Jumlah Total Kelompok</label>
								<input type="number" class="form-control" name="jumlah_total_kelompok" id="jumlah_total_kelompok" required value="{{ old('jumlah_total_kelompok') }}">
							</div>
							<div class="form-group">
								<label for="nama_semua_anggota">Nama Anggota Kelompok</label>
								<input type="text" class="form-control mb-0" name="nama_semua_anggota" id="nama_semua_anggota" placeholder="Contoh: Ronaldowati,Ahmad Messi,Bambang Pamungkas" 
									value="{{ old('nama_semua_anggota') }}" required>
								<small>* Untuk nama anggota ditulis nama lengkap & dipisahkan dengan koma (tanpa spasi)</small>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="tujuan">Tujuan Kerja Praktek</label>
								<textarea class="form-control" name="tujuan" id="tujuan" rows="1" style="min-height: 0" required>{{ old('tujuan') }}</textarea>
							</div>
							
							<div class="form-group">
								<label for="instansi">Ajuan Topik <small>(Optional)</small></label>
								<input type="text" class="form-control" name="ajuan_topik" id="ajuan_topik" value="{{ old('ajuan_topik') }}">
							</div>
							<div class="form-group">
								<label>Periode Awal Kerja Praktek</label>
								<div class="input-group date">
									<input type="text" class="form-control periode-awal" placeholder="dd-mm-yyyy" name="periode_awal" required value="{{ old('periode_awal') }}" autocomplete=false>
									<div class="input-group-text">
										<span class="fa fa-calendar"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Periode Akhir Kerja Praktek</label>
								<div class="input-group date">
									<input type="text" class="form-control periode-akhir" placeholder="dd-mm-yyyy" name="periode_akhir" required value="{{ old('periode_akhir') }}" autocomplete=false>
									<div class="input-group-text">
										<span class="fa fa-calendar"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="periode_awal_kerja">Lama Pelaksanaan KP</label>
		
								<div class="form-group">
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" type="radio" id="1_month" name="lama_pelaksanaan" value="1" required>
										<label for="1_month" class="custom-control-label font-weight-normal">1 Bulan</label>
										</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" type="radio" id="2_month" name="lama_pelaksanaan" value="2" required>
										<label for="2_month" class="custom-control-label font-weight-normal">2 Bulan</label>
										</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" type="radio" id="3_month" name="lama_pelaksanaan" value="3" required> 
										<label for="3_month" class="custom-control-label font-weight-normal">3 Bulan</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="cv">CV</label>
								<input type="file" name="cv" id="cv" class="form-control h-100 mb-0 @error('cv') is-invalid @enderror" accept=".pdf" value="{{ old('cv') }}">
								@error('cv')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
								<small>* Max size 2 MB | Format: *pdf</small>
							</div>
							<div class="form-group">
								<label for="proposal">Proposal</label>
								<input type="file" name="proposal" id="proposal" class="form-control h-100 mb-0  @error('proposal') is-invalid @enderror" accept=".pdf" value="{{ old('proposal') }}">
								@error('proposal')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
								<small>* Max size 2 MB | Format: *pdf</small>
							</div>
						</div>
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
		$('.select2[name=jurusan]').select2({
			placeholder: 'Pilih jurusan',
			allowClear: true,
			ajax: {
				url: $('.select2[name=jurusan]').data('jurusan-select2')
			}
		})
		$('.select2[name=jenjang_pendidikan]').select2()

		$('.periode-awal').datepicker({
			format: 'dd-mm-yyyy',
			clearBtn: true,
			todayHighlight: true,
		});

		$('.periode-akhir').datepicker({
			format: 'dd-mm-yyyy',
			clearBtn: true,
			todayHighlight: true,
		});
	</script>
@endpush