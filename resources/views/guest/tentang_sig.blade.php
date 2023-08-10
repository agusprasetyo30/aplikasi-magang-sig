@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
	<h3><span>Tentang SIG</span></h3>
	<br>
	<div class="row">
		<div class="col-md-5">
			<img src="{{ asset('img/tentang-sig.jpg') }}" alt="" srcset="" class="w-100">
		</div>
		<div class="col-md-7">
			<p style="text-align: justify">
				SIG merupakan perusahaan solusi bangunan multinasional yang terdepan di Indonesia. Selain menguasai kurang lebih 50% pangsa pasar semen domestik, kini SIG memiliki variansi produk turunan semen yang memiliki fleksibilitas rentang spesifikasi lengkap, beserta solusi layanan pendukung, untuk memenuhi persyaratan kondisi bangunan sesuai kebutuhan pelanggan, dimanapun berada.
			</p>
			<p style="text-align: justify">
				Dukungan fasilitas produksi dan distribusi yang luas, dilengkapi kekuatan finansial, memungkinkan SIG melayani semua pasar di Indonesia maupun pasar regional secara efisien. Hal tersebut mengukuhkan posisi SIG sebagai <i>building material solution provider</i>.
			</p>
			</div>
	</div>
@endsection