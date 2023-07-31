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
					<form action="" method="post">
						@csrf
						<div class="form-group">
							<label for="jurusan">Jurusan / Program Studi</label>
							<input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Input data Jurusan / Program Studi">
						</div>
						<div class="form-group">
							<label for="jenjang_pendidikan">Jenjang Pendidikan</label>
							<input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control" placeholder="Ex: SMK, D3, D4, S1, S2">
						</div>
						<div class="form-group">
							<label for="kuota">Kuota</label>
							<input type="number" name="kuota" id="kuota" class="form-control" placeholder="Input kuota KP">
						</div>
						<div class="form-group">
							<label for="bulan_pelaksanaan">Bulan Pelaksanaan</label>
							<select name="bulan_pelaksanaan" id="bulan_pelaksanaan" class="form-control">
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