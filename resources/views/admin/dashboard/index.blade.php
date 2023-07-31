@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<div class="row mb-3">
		<div class="col-6">
			<h4>Dashboard</h4>
		</div>
		<div class="col-6 text-right">
			<span class="p-2 bg-primary">Hallo, melkan uhuy</span>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>150</h3>
	
					<p>Total Mahasiswa</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>150</h3>
	
					<p>Total Pengajuan</p>
				</div>
				<div class="icon">
					<i class="fa fa-address-card"></i>
				</div>
				<a href="#" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-12">
			<div class="card card-info">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-list mr-2"></i> List Pengajuan Pending</h5>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td width="5%">No</td>
								<td width="25%">Nama</td>
								<td width="10%">NIM</td>
								<td width="32%">Universitas</td>
								<td width="18%">Tanggal Pengajuan</td>
								<td width="10%">Status</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Melkan Santoso</td>
								<td>1721640002</td>
								<td>Politeknik Elektronika Negeri Surabaya</td>
								<td>08 Jul 2023</td>
								<td>
									<span class="badge badge-primary">DISETUJUI</span>
									<span class="badge badge-warning">PENDING</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection