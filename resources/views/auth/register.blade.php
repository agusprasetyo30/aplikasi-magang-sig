@extends('layouts.custom_app')

@section('content')
<div class="col-md-6">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title text-center">Daftar</h3>
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="mb-2">
					<label for="fullname" class="form-label">Nama Lengkap</label>
					<input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" >
					@error('fullname')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-2">
					<label for="email" class="form-label">Email</label>
					<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
					@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-2">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
					@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-2">
					<label for="password_confirmation" class="d-block">Password Confirmation</label>
					<input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
				</div>
				<div class="text-center" style="margin-top: 15px">
					<button type="submit" class="btn btn-danger btn-block">Registration</button>
					<a class="btn btn-info btn-block" href="{{ route('dashboard') }}">Kembali</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection