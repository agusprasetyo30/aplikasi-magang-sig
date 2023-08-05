@extends('layouts.app')

@section('title', 'Create Input Kuota KP')

@section('content')
	<div class="row mt-4 justify-content-center">
		<div class="col-6">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-edit mr-2"></i> Edit Jurusan / Program Studi</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="post">
						@csrf
						@method('put')
						<div class="form-group">
							<label for="nama">Nama Jurusan / Program Studi</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Input Jurusan / Program Studi" data-jurusan-select2="{{ route('select2.jurusan') }}" 
								value="{{ $jurusan->name }}">
						</div>
						<div class="form-group">
							<label for="description">Deskripsi</label>
							<textarea name="description" id="description" rows="3" class="form-control" style="min-height: 0">{{ $jurusan->description }}</textarea>
						</div>
						<div class="form-group">
							<a href="{{ route('admin.jurusan.index') }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-left mr-2"></i> Kembali</a>
							<button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-edit mr-2"></i> Update</button>
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