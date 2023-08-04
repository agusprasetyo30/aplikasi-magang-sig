@extends('layouts.app')

@section('title', 'Create Input Kuota KP')

@section('content')
	<div class="row mt-4 justify-content-center">
		<div class="col-6">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-user-plus mr-2"></i> Tambah Kuota Penerimaan KP</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.kelola-kuota.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="jurusan">Jurusan / Program Studi</label>
							<select name="jurusan" id="jurusan" class="select2 w-100" required></select>
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
							<label for="kuota">Kuota</label>
							<input type="number" name="kuota" id="kuota" class="form-control" placeholder="Input kuota KP">
						</div>
						<div class="form-group">
							<label for="bulan_pelaksanaan">Bulan Pelaksanaan</label>
							<select name="bulan_pelaksanaan" id="bulan_pelaksanaan" class="form-control select2">
								<option value="#" selected>Pilih Bulan Pelaksanaan</option>
								<option value="1">Januari</option>
								<option value="2">Pebruari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="form-group">
							<a href="{{ route('admin.kelola-kuota.index') }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-left mr-2"></i> Kembali</a>
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fa fa-save mr-2"></i> Simpan</button>
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
				url: "/select2/jurusan" 
			}
		})

		$('.select2[name=jenjang_pendidikan]').select2()
		$('.select2[name=bulan_pelaksanaan]').select2()
	</script>
@endpush