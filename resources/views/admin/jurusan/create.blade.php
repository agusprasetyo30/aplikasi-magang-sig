@extends('layouts.app')

@section('title', 'Create Input Kuota KP')

@section('content')
	<div class="row mt-4 justify-content-center">
		<div class="col-6">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-user-plus mr-2"></i> Tambah Jurusan / Program Studi</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.jurusan.store') }}" method="post">
						@csrf
						
						<div class="form-group">
							<label for="nama">Nama Jurusan / Program Studi</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Input Jurusan / Program Studi" data-jurusan-select2="{{ route('select2.jurusan') }}">
						</div>
						<div class="form-group">
							<label for="description">Deskripsi</label>
							<textarea name="description" id="description" rows="3" class="form-control" style="min-height: 0" ></textarea>
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
				url: $('.select2[name=jurusan]').data('jurusan-select2')
			}
		})

		$('.select2[name=jenjang_pendidikan]').select2()
		$('.select2[name=bulan_pelaksanaan]').select2()
	</script>
@endpush