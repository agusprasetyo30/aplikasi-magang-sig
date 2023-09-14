@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>
		ul.pagination {
			justify-content: center;
		}
	</style>
@endpush

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
					<div class="col-md-3">
						<label>
							Search:
						</label>
						<div class="input-group">
							<input type="search" class="form-control" name="search" placeholder="Masukan data pencarian ..." value="{{ Request::get('search') ?? '' }}">
								{{-- <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Periode</label>
							<div class="input-group date">
								<input type="text" class="form-control periode" placeholder="Bulan - Tahun" name="periode" value="{{ Request::get('periode') }}" autocomplete="off">
								<div class="input-group-text">
									<span class="fa fa-calendar"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="status">
							Status:
						</label>
						<div class="input-group-append">
							<select name="status" id="status" class="form-control select2">
								<option value="" selected></option>
								<option value="disetujui" {{Request::get('status') == 'disetujui' ? 'selected' : ''}}>Disetujui</option>
								<option value="ditolak" {{Request::get('status') == 'ditolak' ? 'selected' : ''}}>Ditolak</option>
								<option value="pending" {{Request::get('status') == 'pending' ? 'selected' : ''}}>Pending</option>
							</select>
							<button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</form>

			<div class="row">
				<table class="table table-bordered table-hover table-striped">
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
											<form action="{{ route('admin.peserta-magang.approval', ['id' => $value->id, 'type' => 'approve']) }}" method="post">
												@method('put')
												@csrf
												<button class="btn btn-success btn-sm btn-block text-left mb-1" type="submit" onclick="return confirm('Apakah anda yakin menyetujui pengajuan ini ?')"><i class="fa fa-check mr-2"></i>Disetujui</button>
											</form>

											<form action="{{ route('admin.peserta-magang.approval', ['id' => $value->id, 'type' => 'reject']) }}" method="post">
												@csrf
												@method('put')
												<button class="btn btn-danger btn-sm btn-block text-left mb-1" type="submit" onclick="return confirm('Apakah anda yakin menolak pengajuan ini ?')"><i class="fa fa-times mr-2"></i>Ditolak</button>
											</form>

											@break

										@case(1)
											<a href="{{ route('admin.peserta-magang.upload-data-view', $value->id ) }}" class="btn btn-primary btn-sm btn-block text-left"><i class="fa fa-upload mr-2"></i> Upload Data</a>
											@break

										@case(2)
											<a href="#" class="btn btn-danger btn-sm btn-block text-left"><i class="fa fa-trash mr-2"></i> Hapus</a>
											@break
									@endswitch

									{{-- Cek apakah sudah melakukan persetujuana tau penolakan --}}
									@if ($value->status != 0)
										<a href="{{ route('admin.peserta-magang.edit', $value->id) }}" class="btn btn-warning btn-sm btn-block text-left"><i class="fa fa-edit mr-2"></i> Edit</a>
									@endif

									<a href="{{ route('admin.peserta-magang.show', $value->id) }}" class="btn btn-info btn-sm btn-block text-left"><i class="fa fa-list mr-2"></i> Details</a>
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
		$('#status').select2({
			placeholder: 'Pilih status',
			allowClear: true,
		})

		$(".periode").datepicker( {
			format: "mm-yyyy",
			startView: "months",
    		minViewMode: "months",
		});
	</script>


@endpush
