@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
	<style>
		ul.pagination {
			justify-content: center;
		}

		.add-jurusan-button {
			position: absolute;
			right: 8px;
			bottom: 0;
		}
	</style>
@endpush

@section('content')
<h3 class="mb-3"><span>Jurusan</span></h3>

<div class="card">
	<div class="card-body">
		<form action="" method="get">
				<div class="row mb-2">
					<div class="col-md-4">
						<label>
							Search:
						</label>
						<div class="input-group">
							<input type="search" class="form-control" name="jurusan_name" placeholder="Masukan nama jurusan ..." value="{{ Request::get('jurusan_name') ?? '' }}">
								<button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
						</div>
					</div>
				<div class="col-md-8 text-right">
					<a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary add-jurusan-button"><i class="fa fa-plus"></i> Tambah Jurusan</button></a>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="40%">Jurusan / Program Studi</th>
							<th width="30%">Deskripsi</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($jurusan as $value)
						<tr>
							<td>{{ $number++ }}. </td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->description }}</td>
							<td>
								<form action="{{ route('admin.jurusan.destroy', $value->id) }}" method="post">
									<a href="{{ route('admin.jurusan.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
									@csrf
									@method('delete')
									<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Hapus data ?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach

						@if (count($jurusan) == 0)
							<tr>
								<td colspan="4" align=center>Data tidak ditemukan</td>
							</tr>
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">
								{{ $jurusan->appends(Request::all())->links()}}
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

