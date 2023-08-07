@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>
		ul.pagination {
			justify-content: center;
		}
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
			<form action="" method="get">
				<div class="row ">
					<div class="col-md-3">
						<label>
							Search:
						</label>
						<input type="search" class="form-control" name="user_name" placeholder="Masukan nama pengguna ..." value="{{ Request::get('user_name') ?? '' }}" aria-controls="job_grading_table">
					</div>
					<div class="col-md-3">
						<label for="user_type">
							User Type:
						</label>
						<div class="input-group">
							<select name="user_type" id="user_type" class="form-control select2">
								<option value="" selected></option>
								<option value="admin" {{Request::get('user_type') == 'admin' ? 'selected' : ''}}>Admin</option>
								<option value="user" {{Request::get('user_type') == 'user' ? 'selected' : ''}}>Mahasiswa</option>
							</select>
							<button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<div class="col-md-6 text-right" style="margin-bottom: 20px">
						<a href="{{ route('admin.user-management.create') }}" class="btn btn-primary add-user-button"><i class="fa fa-plus"></i> Tambah Pengguna</button></a>
				</div>
			</form>
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
					@foreach ($users as $value)
						<tr>
							<td>{{ $number++ }}.</td>
							<td>{{ $value->fullname }}</td>
							<td>{{ $value->email }}</td>
							<td>
								@switch($value->role)
									@case('admin')
										<span class="badge badge-success p-2">Admin</span>
										@break
		
										@case('user')
										<span class="badge badge-primary p-2">Mahasiswa</span>								
										@break
								@endswitch
							</td>
							<td>
								<form action="{{ route('admin.user-management.destroy', $value->id) }}" method="post">
									<a href="{{ route('admin.user-management.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
									@csrf
									@method('delete')
									<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Hapus data ?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach

					@if (count($users) == 0)
						<tr>
							<td colspan="5" align=center>Data tidak ditemukan</td>
						</tr>
					@endif
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">
							{{ $users->appends(Request::all())->links()}}
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('.select2[name=user_type]').select2({
			placeholder: 'Pilih tipe',
			allowClear: true,
		})
	</script>
@endpush