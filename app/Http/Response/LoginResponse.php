<?php
namespace App\Http\Response;

use Auth;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;

class LoginResponse implements ContractsLoginResponse
{
	// Digunakan untuk mengatur redirect setelah registrasi
	
	public function toResponse($request) {
		$home = '/mahasiswa';

		if (Auth::user()->role == 'admin') {
			$home = '/admin';
		}

		return redirect($home);
	}
}