<?php
namespace App\Http\Response;

use Auth;
use Laravel\Fortify\Contracts\RegisterResponse as ContractsRegisterResponse;

class RegisterResponse implements ContractsRegisterResponse
{
	// Digunakan untuk mengatur redirect setelah registrasi

	public function toResponse($request) {
		$home = '/user';

		if (Auth::user()->role == 'admin') {
			$home = '/admin';
		}

		return redirect($home);
	}
}