@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><i class="fa fa-upload mr-2"></i>Edit Data Mahasiswa : <b>{{ $peserta_magang->name }}</b></h3>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.peserta-magang.update', $peserta_magang->id) }}" method="post">
						@csrf
						@method('put')
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="nama">Status Penerimaan</label>
									<select name="status" id="status" class="form-control select2">
										<option value="" selected></option>
										<option value="0" {{$peserta_magang->status == 0 ? 'selected' : ''}}>Pending</option>
										<option value="1" {{$peserta_magang->status == 1 ? 'selected' : ''}}>Disetujui</option>
										<option value="2" {{$peserta_magang->status == 2 ? 'selected' : ''}}>Ditolak</option>
									</select>
								</div>

								<div class="form-group">
									<label for="summernote">Note Pengumuman</label>
									<textarea id="pengumuman" name="pengumuman">{{ $peserta_magang->pengumuman }}</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12 text-right">
								<a href="{{ route('admin.peserta-magang.index') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save mr-1"></i>Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<!-- include summernote css/js -->
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#pengumuman').summernote({
				height: 300
			});

			$('#status').select2({
				placeholder: 'Pilih status',
			})
		});
	</script>
@endpush
