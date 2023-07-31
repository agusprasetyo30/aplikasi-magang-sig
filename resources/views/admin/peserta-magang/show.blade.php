@extends('layouts.app')

@section('title', 'Detail Data Peserta')

@section('content')
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card card-info">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-list mr-2"></i> Detail Data Peserta : <b>Melkan Santoso</b></h5>
				</div>
				<div class="card-body" style="font-size: 14.5px">
					<div class="row">
						<div class="col-md-3 font-weight-bolder">NIM</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">123456789</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Nama Lengkap</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Melkan Santoso</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Email</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8"><a href="mailto:melkan@gmail.com">melkan@gmail.com</a></div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">No. Handphone</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">0863234455555</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Jenis Kelamin</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Laki-laki</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Alamat</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur libero provident eos laudantium cumque nostrum. Ratione sequi eligendi eius quia.</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Asal Instansi / Sekolah</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Politeknik Elektronika Negeri Surabaya</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Jurusan / Program Studi</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Teknik Informatika</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Periode KP</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">September</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Lama Pelaksanaan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">3 Bulan</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Tanggal Mendaftar</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">10 Jul 2023</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Tahun</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">2023</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Tujuan Kerja Praktek</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, minima provident ratione rerum consequuntur blanditiis reiciendis aliquam? Vel, unde ipsa.</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Status</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8"><span class="badge badge-primary">DISETUJUI</span>
							<span class="badge badge-warning">PENDING</span>
							<span class="badge badge-danger">DITOLAK</span></div>
					</div>
					

					<p class="bg-primary p-2 mt-2" for="">File Pengajuan KP :</p>

					<div class="row">
						<div class="col-md-3 font-weight-bolder">Proposal</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					

					<p class="bg-primary p-2 mt-2" for="">File Perlengkapan KP :</p>

					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Pernyataan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Panggilan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Rekomendasi</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">KTM</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Keterangan Sehat</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">BPJS</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Foto</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Twibbon</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Keterangan Selesai KP</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="#">Ini adalah link yang nantinya untuk melihat file proposal yang diupload</a>
						</div>
					</div>
					<hr>

					<a href="#" class="btn btn-sm btn-info"><i class="fa fa-arrow-left mr-2"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection
