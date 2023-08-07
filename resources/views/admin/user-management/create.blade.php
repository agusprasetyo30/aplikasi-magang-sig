@extends('layouts.app')

@section('title', 'Create Input Kuota KP')

@section('content')
	<div class="row mt-4 justify-content-center">
		<div class="col-6">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-user-plus mr-2"></i> Tambah Pengguna</h5>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('admin.user-management.store') }}">
						@csrf
						<div class="mb-2">
							<label for="fullname" class="form-label">Nama Lengkap</label>
							<input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="input nama lengkap">
							@error('fullname')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="mb-2">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="input email">
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="mb-2">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="input password" required>
							@error('password')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="mb-2">
							<label for="password_confirmation" class="d-block">Password Confirmation</label>
							<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
						</div>
						<div class="mb-2">
							<label for="role" class="d-block">Role</label>
							<select name="user_role" id="user_role" class="form-control select2">
								<option value="" selected></option>
								<option value="admin" {{Request::get('user_type') == 'admin' ? 'selected' : ''}}>Admin</option>
								<option value="user" {{Request::get('user_type') == 'user' ? 'selected' : ''}}>Mahasiswa</option>
							</select>
						</div>
						<div class="text-left" style="margin-top: 15px">
							<a class="btn btn-secondary btn-sm" href="{{ route('admin.user-management.index') }}"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
							<button type="submit" class="btn btn-success btn-sm float-right"><i class="fa fa-save mr-2"></i>Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('.select2[name=user_role]').select2({
			placeholder: 'Pilih role pengguna',
			allowClear: true,
		})

		$('.select2[name=jenjang_pendidikan]').select2()
		$('.select2[name=bulan_pelaksanaan]').select2()
	</script>
@endpush