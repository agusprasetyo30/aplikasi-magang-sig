@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row mb-3">
		<div class="col-6">
			<h4>Peserta Magang</h4>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group searching">
						<label>
							Search:
						</label>
						<input type="search" class="form-control" name="job_grading_search" aria-controls="job_grading_table">
					</div>
				</div>
				{{-- <div class="col-md-9">
					<button type="button" class="btn btn-primary btn-add-job-grading float-right">
						<i class="fas fa-plus"></i> Add Job Grading</button>
				</div> --}}
			</div>

			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="25%">Nama</th>
							<th width="20%">Jurusan / Program Studi</th>
							<th width="25%">Universitas</th>
							<th width="10%">Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Melkan Santoso</td>
							<td>Teknik Informatika</td>
							<td>
								Politeknik Elektronika Negeri Surabaya
							</td>
							<td>
								<span class="badge badge-primary">DISETUJUI</span>
								<span class="badge badge-warning">PENDING</span>
								<span class="badge badge-danger">DITOLAK</span>
							</td>
							<td>
								<a href="#" class="btn btn-success btn-sm btn-block text-left"><i class="fa fa-check mr-2"></i> Disetujui</a>
								<a href="#" class="btn btn-danger btn-sm btn-block text-left"><i class="fa fa-times mr-2"></i> Ditolak</a>
								<a href="{{ route('admin.peserta-magang.upload-data-view', 1) }}" class="btn btn-primary btn-sm btn-block text-left"><i class="fa fa-upload mr-2"></i> Upload Data</a>
								<a href="{{ route('admin.peserta-magang.show', 1) }}" class="btn btn-info btn-sm btn-block text-left"><i class="fa fa-list mr-2"></i> Details</a>
								<a href="#" class="btn btn-danger btn-sm btn-block text-left"><i class="fa fa-trash mr-2"></i> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('a.test').click(function() {
			console.log('aa');
			toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});
	</script>
@endpush