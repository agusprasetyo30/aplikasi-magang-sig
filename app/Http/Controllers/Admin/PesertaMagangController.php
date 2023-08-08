<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\BerkasPengajuanMagang;
use App\Models\PengajuanMagang;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PesertaMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jumlah_halaman = 5;
        $number = General::numberPagination($jumlah_halaman);
        
        $peserta_magang = PengajuanMagang::paginate($jumlah_halaman);
        
        if (!is_null($request->search)) {
            // Pencarian nama, jurusan/prodi, dan universitas/instansi
            $peserta_magang = PengajuanMagang::whereHas('jurusan', function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->get('search') . '%');
                })
                ->orWhere('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('instansi', 'like', '%' . $request->get('search') . '%')->paginate($jumlah_halaman);
        }

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
        $periode_kp = '';
        
        // default ketika mahasiswa/user sudah diterima dan upload pengajuan sudah disetujui
        // jika statusnya true maka bisa menampilkan file 
        $status_berkas_pengajuan_magang = true; 
        
        $peserta_magang = PengajuanMagang::with('berkasPengajuanMagang', 'user')
            ->where('id', $id)->first();

        // kalau data tidak ditemukan
        if (!$peserta_magang) {
            return abort(404);
        }

        if (!is_null($peserta_magang->jurusan->kuotaMagang)) {
            $periode_kp = General::generateBulan($peserta_magang->jurusan->kuotaMagang->bulan_pelaksanaan);
        }
        $peserta_magang->periode_kp = $periode_kp;
        $peserta_magang->created_at_formatted = Carbon::parse($peserta_magang->created_at)->format('d F y');
        $peserta_magang->periode_awal = Carbon::parse($peserta_magang->periode_awal)->format('d F y');
        $peserta_magang->periode_akhir = Carbon::parse($peserta_magang->periode_akhir)->format('d F y');

        // Jika upload berkas ditolak
        if (is_null($peserta_magang->berkasPengajuanMagang)) {
            $status_berkas_pengajuan_magang = false;
        }

        // dd($peserta_magang);

        // untuk proses nama list anggota
        $nama_anggota_kelompok = json_decode($peserta_magang->nama_anggota_kelompok);
        
        foreach ($nama_anggota_kelompok as $key => $value) {
            $merge_nama_anggota = $merge_nama_anggota . $nama_anggota_kelompok[$key];

            if ($key != count($nama_anggota_kelompok) - 1) {
                $merge_nama_anggota = $merge_nama_anggota . ', ';
            }
        }

        return view('admin.peserta-magang.show', compact('peserta_magang', 'merge_nama_anggota', 'status_berkas_pengajuan_magang'));
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

    /**
     * 
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function approvalRejectPesertaMagang($id, $type)
    {
        DB::beginTransaction();
        
        try {
            $status_approval = '';
            
            switch ($type) {
                case 'approve':
                    $status_approval = '1';

                    // Jika approve maka secara otomatis membuat data berkas pengajuan magang yang telasi ke pengajuan magang
                    BerkasPengajuanMagang::create([
                        'pengajuan_magang_id' => $id
                    ]);

                    break;

                case 'reject':
                    $status_approval = '2';
                    break;
            }

            PengajuanMagang::where('id', $id)->update([
                'status'  => $status_approval
            ]);
            
            DB::commit();

            return redirect()
                ->route('admin.peserta-magang.index')
                ->with('alert_type', 'success')
                ->with('message', 'Pengajuan magang mahasiswa berhasil di' . $type);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('admin.peserta-magang.index')
                ->with('alert_type', 'success')
                ->with('message', $e->getMessage());
        }
        // dd($type, $id, $status_approval, $peserta_magang);
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
