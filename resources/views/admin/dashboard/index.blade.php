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
			<h4>Dashboard</h4>
		</div>
		<div class="col-6 text-right">
			<span class="p-2 bg-primary">Hallo, {{ Auth::user()->fullname }}</span>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>{{ $total_mahasiswa }}</h3>
	
					<p>Total Mahasiswa</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="{{ route('admin.peserta-magang.index') }}" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>{{ $total_pengajuan_magang }}</h3>
	
					<p>Total Pengajuan</p>
				</div>
				<div class="icon">
					<i class="fa fa-address-card"></i>
				</div>
				<a href="{{ route('admin.peserta-magang.index') }}" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-12">
			<div class="card card-info">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-list mr-2"></i> List Pengajuan Magang</h5>
				</div>
				<div class="card-body">
					<form action="" method="get">
						<div class="row mb-2">
							<div class="col-md-3">
								<label>
									Search:
								</label>
								<div class="input-group">
									<input type="search" class="form-control" name="name" placeholder="Nama atau Instansi" value="{{ Request::get('name') ?? '' }}">
										{{-- <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button> --}}
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
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="5%">No</th>
								<th width="25%">Nama</th>
								<th width="10%">NIM</th>
								<th width="32%">Universitas</th>
								<th width="18%">Tanggal Pengajuan</th>
								<th width="10%">Status</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($pengajuan_magang as $value)
								<tr>
									<td>{{ $number++ }}.</td>
									<td>{{ $value->name }}</td>
									<td>{{ $value->nim }}</td>
									<td>{{ $value->instansi }}</td>
									<td>{{ \Carbon\Carbon::parse($value->created_at)->format('d M Y') }}</td>
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
								</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" align="center">
									{{-- Showing {{ $pengajuan_magang->firstItem() }} to {{ $pengajuan_magang->lastItem() }} of total {{$pengajuan_magang->total()}} entries --}}

									{{ $pengajuan_magang->appends(Request::all())->links()}}
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
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
	</script>
@endpush