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
					<td>
						@switch($value->bulan_pelaksanaan)
							@case(1)
								Januari
								@break
							@case(2)
								Februari
								@break
							@case(3)
								Maret
								@break
							@case(4)
								April
								@break
							@case(5)
								Mei
								@break
							@case(6)
								Juni
								@break
							@case(7)
								Juli
								@break
							@case(8)
								Agustus
								@break
							@case(9)
								September
								@break
							@case(10)
								Oktober
								@break
							@case(11)
								Nopember
								@break
							@case(12)
								Desember
								@break
						@endswitch
					</td>
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