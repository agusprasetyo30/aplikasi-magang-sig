@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>
		.add-user-button {
			position: absolute;
			right: 8px;
			bottom: 0;
		}
	</style>
@endpush

@section('content')
	<h3 class="mb-3"><span>User Management</span></h3>

	<div class="card">
		<div class="card-body">
			<div class="row mb-2">
				<div class="col-md-3">
						<label>
							Search:
						</label>
						<input type="search" class="form-control" name="job_grading_search" aria-controls="job_grading_table">
				</div>
				<div class="col-md-9 text-right">
					<button type="button" class="btn btn-primary add-user-button">
						<i class="fa fa-plus"></i> Add User</button>
				</div>
			</div>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="33%">Nama</th>
						<th width="32%">Email</th>
						<th width="20%">Role</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.</td>
						<td>Melkan Santoso</td>
						<td>melkan@gmail.com</td>
						<td>
							<span class="badge badge-primary p-2">Mahasiswa</span>
							<span class="badge badge-success p-2">Admin</span>
						</td>
						<td>
							<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection