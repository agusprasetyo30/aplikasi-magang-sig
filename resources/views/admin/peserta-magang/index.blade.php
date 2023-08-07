@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row mb-3">
		<div class="col-6">
			<h4>Peserta Magang</h4>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<form action="" method="get">
				<div class="row mb-2">
					<div class="col-md-4">
						<label>
							Search:
						</label>
						<div class="input-group">
							<input type="search" class="form-control" name="search" placeholder="Masukan data pencarian ..." value="{{ Request::get('search') ?? '' }}">
								<button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</form>

			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="20%">Nama</th>
							<th width="25%">Jurusan / Program Studi</th>
							<th width="20%">Universitas</th>
							<th width="10%">Status</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($peserta_magang as $value)
							<tr>
								<td>{{ $number++ }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->jurusan->name }}</td>
								<td>
									{{ $value->instansi }}
								</td>
								<td>
									@switch($value->status)
										@case(0)
											<span class="badge badge-warning">PENDING</span>
											@break

										@case(1)
											<span class="badge badge-primary">DISETUJUI</span>
											@break

										@case(2)
											<span class="badge badge-danger">DITOLAK</span>
											@break											
									@endswitch
								</td>
								<td>
									@switch($value->status)
										@case(0)
											<a href="#" class="btn btn-success btn-sm btn-block text-left"><i class="fa fa-check mr-2"></i> Disetujui</a>
											<a href="#" class="btn btn-danger btn-sm btn-block text-left"><i class="fa fa-times mr-2"></i> Ditolak</a>
											@break

										@case(1)
											<a href="{{ route('admin.peserta-magang.upload-data-view', 1) }}" class="btn btn-primary btn-sm btn-block text-left"><i class="fa fa-upload mr-2"></i> Upload Data</a>
											<a href="{{ route('admin.peserta-magang.show', 1) }}" class="btn btn-info btn-sm btn-block text-left"><i class="fa fa-list mr-2"></i> Details</a>
											@break

										@case(2)
											<a href="{{ route('admin.peserta-magang.show', 1) }}" class="btn btn-info btn-sm btn-block text-left"><i class="fa fa-list mr-2"></i> Details</a>
											@break											
									@endswitch
									<a href="#" class="btn btn-danger btn-sm btn-block text-left"><i class="fa fa-trash mr-2"></i> Hapus</a>
								</td>
							</tr>
						@endforeach

						@if (count($peserta_magang) == 0)
							<tr>
								<td colspan="6" align=center>Data tidak ditemukan</td>
							</tr>
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								{{ $peserta_magang->appends(Request::all())->links()}}
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('a.test').click(function() {
			console.log('aa');
			toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
		});
	</script>
@endpush