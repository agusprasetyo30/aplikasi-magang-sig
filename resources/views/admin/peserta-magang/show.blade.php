@extends('layouts.app')

@section('title', 'Detail Data Peserta')

@section('content')
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card card-info">
				<div class="card-header">
					<h5 class="card-title"><i class="fa fa-list mr-2"></i> Detail Data Peserta : <b>{{ $peserta_magang->name }}</b></h5>
				</div>
				<div class="card-body" style="font-size: 14.5px">
					<div class="row">
						<div class="col-md-3 font-weight-bolder">NIM</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->nim }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Nama Lengkap</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->name }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Email</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8"><a href="mailto:{{ $peserta_magang->user->email }}">{{ $peserta_magang->user->email }}</a></div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">No. Handphone</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->telepon }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Asal Instansi / Sekolah</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->instansi }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Rekomendasi</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->rekomendasi }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Jurusan / Program Studi</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->jurusan->name }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Periode KP</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->periode_kp }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Lama Pelaksanaan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->lama_bulan_pelaksanaan }} Bulan</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Tanggal Mendaftar</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->created_at_formatted }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Periode Awal KP</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->periode_awal }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Periode Akhir KP</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->periode_akhir }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Tujuan Kerja Praktek</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->tujuan }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Status</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@switch($peserta_magang->status)
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
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Jumlah Anggota Kelompok</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $peserta_magang->jumlah_total_kelompok }}</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Nama Anggota Kelompok</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">{{ $merge_nama_anggota }}</div>
					</div>
					<p class="bg-primary p-2 mt-2" for="">File Pengajuan KP :</p>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Proposal</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="{{ asset('storage/' . $peserta_magang->proposal_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->proposal_file_name }}</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">CV</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="{{ asset('storage/' . $peserta_magang->cv_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->cv_file_name }}</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Pengantar</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							<a href="{{ asset('storage/' . $peserta_magang->surat_pengantar_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->surat_pengantar_file_name }}</a>
						</div>
					</div>


					@if ($status_berkas_pengajuan_magang)

					<p class="bg-primary p-2 mt-2" for="">File Perlengkapan KP :</p>

					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Pernyataan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->surat_pernyataan_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->surat_pernyataan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->surat_pernyataan_file_name }}</a>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Panggilan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->surat_panggilan_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->surat_panggilan_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->surat_panggilan_file_name }}</a>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Persetujuan</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->surat_rekomendasi_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->surat_rekomendasi_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->surat_rekomendasi_file_name }}</a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">KTM</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->ktm_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->ktm_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->ktm_file_name }}</a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Surat Keterangan Sehat</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->surat_sehat_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->surat_sehat_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->surat_sehat_file_name }}</a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Asuransi Kecelakaan Kerja</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->bpjs_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->bpjs_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->bpjs_file_name }}</a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Foto</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->foto_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->foto_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->foto_file_name }}</a>
							@endif

						</div>
					</div>
					<div class="row">
						<div class="col-md-3 font-weight-bolder">Twibbon</div>
						<div class="col-md-1 text-right">:</div>
						<div class="col-md-8">
							@if (!is_null($peserta_magang->berkasPengajuanMagang->twibbon_upload_path))
								<a href="{{ asset('storage/' . $peserta_magang->berkasPengajuanMagang->twibbon_upload_path) }}" title="Klik untuk membuka file" target="_blank">{{ $peserta_magang->berkasPengajuanMagang->twibbon_file_name }}</a>
							@endif

						</div>
					</div>
					@endif

					<hr>

					<a href="{{ route('admin.peserta-magang.index') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
@endsection
