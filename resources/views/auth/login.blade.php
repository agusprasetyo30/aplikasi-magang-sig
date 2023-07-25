@extends('layouts.custom_app')

@section('content')
<div class="col-md-5">
	<div class="card">
		<div class="card-body">
			<h2 class="card-title text-center">Login</h2>
			<form method="POST" action="">
				@csrf
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" >
					@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" >
					@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-block">Login</button>
					<a class="btn btn-info btn-block" href="{{ route('dashboard') }}">Kembali</a>
				</div>

				<div class="mt-3 text-center" style="font-size: 12px">
					Kamu belum mempunyai akun ? Silahkan <a href="{{ route('register') }}">Daftar disini</a>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection