<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mahasiswa\BerkasPengajuanMagangController;
use App\Models\BerkasPengajuanMagang;
use App\Models\BerkasPesertaMagang;
use App\Models\PengajuanMagang;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;

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
        
        $peserta_magang = PengajuanMagang::orderBy('created_at', 'desc')->paginate($jumlah_halaman);
        
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
                    
                    BerkasPesertaMagang::create([
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
    }

    public function uploadDataView(Request $request, $id)
    {
        $berkas_peserta_magang = PengajuanMagang::where('id', $id)->first();

        if (is_null($berkas_peserta_magang)) {
            abort(404);
        }
        
        return view('admin.peserta-magang.upload_data', [
            'peserta_magang'        => $berkas_peserta_magang,
            'berkas_peserta_magang' => $berkas_peserta_magang->berkasPesertaMagang,
            'upload_by'       => json_decode($berkas_peserta_magang->berkasPesertaMagang->upload_by)
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function uploadData(Request $request, $id)
    {
        $validation_input = $this->checkValidationInput($request);

        if ($validation_input->fails()) {
            return redirect()->back()->withErrors($validation_input)->withInput();
        }

        $berkas_peserta_magang = BerkasPesertaMagang::where('pengajuan_magang_id', $id)->first();

        // Proses uploading
        if ($request->file('surat_panggilan')) {

            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->surat_panggilan_upload_path);

            $upload_data_surat_panggilan = General::uploadFile($request->file('surat_panggilan'), 'surat-panggilan', 'document/surat-panggilan');

            $request->merge(['surat_panggilan_upload_path' => $upload_data_surat_panggilan['file_location']]);
            $request->merge(['surat_panggilan_file_name' => $request->file('surat_panggilan')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'surat_panggilan_upload_path' => $request->surat_panggilan_upload_path,
                'surat_panggilan_file_name'   => $request->surat_panggilan_file_name
            ]);
        }

        // Absensi
        if ($request->file('absensi')) {
            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->absensi_upload_path);

            $upload_data_absensi = General::uploadFile($request->file('absensi'), 'absensi', 'document/absensi');

            $request->merge(['absensi_upload_path' => $upload_data_absensi['file_location']]);
            $request->merge(['absensi_file_name' => $request->file('absensi')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'absensi_upload_path' => $request->absensi_upload_path,
                'absensi_file_name'   => $request->absensi_file_name
            ]);
        }

        // Surat Persetujuan
        if ($request->file('surat_persetujuan')) {
            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->surat_persetujuan_upload_path);

            $surat_persetujuan = General::uploadFile($request->file('surat_persetujuan'), 'surat-persetujuan', 'document/surat-persetujuan');

            $request->merge(['surat_persetujuan_upload_path' => $surat_persetujuan['file_location']]);
            $request->merge(['surat_persetujuan_file_name' => $request->file('surat_persetujuan')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'surat_persetujuan_upload_path' => $request->surat_persetujuan_upload_path,
                'surat_persetujuan_file_name'   => $request->surat_persetujuan_file_name
            ]);
        }

        // Lampiran Surat Panggilan
        if ($request->file('lampiran_surat_panggilan')) {
            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->lampiran_surat_panggilan_upload_path);

            $lampiran_surat_panggilan = General::uploadFile($request->file('lampiran_surat_panggilan'), 'lampiran-surat-panggilan', 'document/lampiran-surat-panggilan');

            $request->merge(['lampiran_surat_panggilan_upload_path' => $lampiran_surat_panggilan['file_location']]);
            $request->merge(['lampiran_surat_panggilan_file_name' => $request->file('lampiran_surat_panggilan')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'lampiran_surat_panggilan_upload_path' => $request->lampiran_surat_panggilan_upload_path,
                'lampiran_surat_panggilan_file_name'   => $request->lampiran_surat_panggilan_file_name
            ]);
        }

        // ID Card
        if ($request->file('id_card')) {
            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->id_card_upload_path);

            $id_card = General::uploadFile($request->file('id_card'), 'id-card', 'document/id-card');

            $request->merge(['id_card_upload_path' => $id_card['file_location']]);
            $request->merge(['id_card_file_name' => $request->file('id_card')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'id_card_upload_path' => $request->id_card_upload_path,
                'id_card_file_name'   => $request->id_card_file_name
            ]);
        }

        // ID Card
        if ($request->file('form_bimbingan')) {
            (new BerkasPengajuanMagangController)->deleteImage($berkas_peserta_magang->form_bimbingan_upload_path);

            $id_card = General::uploadFile($request->file('form_bimbingan'), 'form-bimbingan', 'document/form_bimbingan');

            $request->merge(['form_bimbingan_upload_path' => $id_card['file_location']]);
            $request->merge(['form_bimbingan_file_name' => $request->file('form_bimbingan')->getClientOriginalName()]);

            $berkas_peserta_magang->update([
                'form_bimbingan_upload_path' => $request->form_bimbingan_upload_path,
                'form_bimbingan_file_name'   => $request->form_bimbingan_file_name
            ]);
        }

        // memasukan data admin untuk identifikasi perubahan
        $admin_arr = [
            'name' => Auth::user()->fullname,
            'email' => Auth::user()->email,
            'datetime' => now()->format('d F Y H:i')
        ];

        $berkas_peserta_magang->update([
            'upload_by' => json_encode($admin_arr)
        ]);

        return redirect()
            ->route('admin.peserta-magang.upload-data-view', $berkas_peserta_magang->pengajuan_magang_id)
            ->with('alert_type', 'success')
            ->with('message', 'Data berkas berhasil diupload');
    }

/**
     * Validation for checking input in form
     *
     * @param [type] $request
     * @return object
     */
    private function checkValidationInput($request)
    {
        $validation = [
            'proposal'        => ['mimes:pdf', 'file', 'max:2048'],
            'cv'              => ['mimes:pdf', 'file', 'max:2048'],
            'surat_pengantar' => ['mimes:pdf', 'file', 'max:2048'],
        ];

        return Validator::make($request->all(), $validation, [
            
        ]);
    }
}
