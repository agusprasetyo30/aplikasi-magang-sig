@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row mt-4">
		<div class="col-12">
			<a href="#" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus"></i> Input Kuota KP</a>
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
					<tr>
						<td>1</td>
						<td>Melkan Santoso</td>
						<td>4</td>
						<td>
							<a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
							<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection

