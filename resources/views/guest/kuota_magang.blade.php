@extends('layouts.app')

@section('title', 'Kuota Magang')

@section('content')
	<h3 class="mb-3"><span>Tentang SIG</span></h3>

	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-4" style="margin-bottom: 20px">
					<form action="" method="get">
						<label>
							Search:
						</label>
						<div class="input-group">
							<input type="search" class="form-control" name="jurusan" placeholder="Masukan nama jurusan ..." value="{{ Request::get('jurusan') ?? '' }}">
								<button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="35%">Jurusan / Program Studi</th>
						<th width="15%">Jenjang</th>
						<th width="20%">Bulan Pelaksanaan</th>
						<th width="25%">Sisa Kuota</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($kuota_magang as $value)
						<tr>
							<td>{{ $number++ }}. </td>
							<td>{{ $value->jurusan->name }}</td>
							<td>{{ $value->jenjang_pendidikan == 'SMA' ? 'SMA / SMK' : $value->jenjang_pendidikan }}</td>
							<td>{{ \App\Helpers\General::generateBulan($value->bulan_pelaksanaan) }}</td>
							<td>{{ $value->kuota }}</td>
						</tr>
					@endforeach

					@if (count($kuota_magang) == 0)
						<tr>
							<td colspan="4" align=center>Data tidak ditemukan</td>
						</tr>
					@endif
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
							{{ $kuota_magang->appends(Request::all())->links()}}
						</td>
					</tr>
				</tfoot>
			</table>

			
			{{-- @empty($kuota_magang)
				<h1>wfwf</h1>
			@endempty --}}
		</div>
	</div>
@endsection