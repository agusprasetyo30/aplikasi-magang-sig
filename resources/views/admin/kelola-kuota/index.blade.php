@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h3 class="mb-3"><span>Kelola Kuota</span></h3>

<div class="card">
	<div class="card-body">
		<div class="row ">
			<div class="col-3">
				<input type="search" name="search" id="search" class="form-control" placeholder="Cari jurusan ...">
			</div>
			<div class="col-9">
				<div class="text-right">
					<a href="{{ route('admin.kelola-kuota.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Input Kuota KP</a>
				</div>
			</div>
			<div class="col-12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="35%">Jurusan / Prodi</th>
							<th width="35%">Sisa Kuota</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($kelola_kuota as $value)
						<tr>
							<td>{{ $number++ }}</td>
							<td>{{ $value->jurusan->name }}</td>
							<td>{{ $value->kuota }}</td>
							<td>
								<form action="{{ route('admin.kelola-kuota.destroy', $value->id) }}" method="post">
									<a href="{{ route('admin.kelola-kuota.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
									@csrf
									@method('delete')
									<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Hapus data ?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4" align="center">
								{{ $kelola_kuota->appends(Request::all())->links()}}
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

