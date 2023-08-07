<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\PengajuanMagang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesertaMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_halaman = 5;
        $number = General::numberPagination($jumlah_halaman);
        
        $peserta_magang = PengajuanMagang::paginate($jumlah_halaman);

        return view('admin.peserta-magang.index', compact('number', 'peserta_magang'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merge_nama_anggota = '';
        $peserta_magang = PengajuanMagang::where('id', $id)->first();

        $peserta_magang->periode_kp = General::generateBulan($peserta_magang->jurusan->kuotaMagang->bulan_pelaksanaan);
        $peserta_magang->created_at_formatted = Carbon::parse($peserta_magang->created_at)->format('d F y');
        $peserta_magang->periode_awal = Carbon::parse($peserta_magang->periode_awal)->format('d F y');
        $peserta_magang->periode_akhir = Carbon::parse($peserta_magang->periode_akhir)->format('d F y');

        // untuk proses nama list anggota
        $nama_anggota_kelompok = json_decode($peserta_magang->nama_anggota_kelompok);
        
        foreach ($nama_anggota_kelompok as $key => $value) {
            $merge_nama_anggota = $merge_nama_anggota . $nama_anggota_kelompok[$key];

            if ($key != count($nama_anggota_kelompok) - 1) {
                $merge_nama_anggota = $merge_nama_anggota . ', ';
            }
        }
        return view('admin.peserta-magang.show', compact('peserta_magang', 'merge_nama_anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadDataView(Request $request, $id)
    {
        return view('admin.peserta-magang.upload_data');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function uploadData(Request $request, $id)
    {

    }
}
