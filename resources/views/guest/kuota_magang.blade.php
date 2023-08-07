@extends('layouts.app')

@section('title', 'Kuota Magang')

@section('content')
	<h3 class="mb-3"><span>Tentang SIG</span></h3>

	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th width="45%">Jurusan / Program Studi</th>
				<th width="25%">Bulan Pelaksanaan</th>
				<th width="25%">Sisa Kuota</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($kuota_magang as $value)
				<tr>
					<td>{{ $number++ }}. </td>
					<td>{{ $value->jurusan->name }}</td>
					<td>{{ \App\Helpers\General::generateBulan($value->bulan_pelaksanaan) }}</td>
					<td>{{ $value->kuota }}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4">
					{{ $kuota_magang->appends(Request::all())->links()}}
				</td>
			</tr>
		</tfoot>
	</table>
@endsection