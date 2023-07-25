@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<h3 class="mb-3"><span>Tentang SIG</span></h3>

	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>No</td>
				<td>Jurusan / Program Studi</td>
				<td>Sisa Kuota</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Teknik Informatika</td>
				<td>1001</td>
				<td><a href="#" class="btn btn-info btn-sm"><i class="fa fa-list-ul mr-2"></i>Detail</a></td>
			</tr>
		</tbody>
	</table>
@endsection