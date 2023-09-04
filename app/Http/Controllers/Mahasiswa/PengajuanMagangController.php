<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\PengajuanMagang;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
use Validator;

class PengajuanMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!is_null(Auth::user()->pengajuanMagang)) {
            return redirect()->route('mahasiswa.pengajuan-magang.edit', Auth::user()->pengajuanMagang->id);
        }

        return redirect()->route('mahasiswa.pengajuan-magang.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.pengajuan-magang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation_input = $this->checkValidationInput($request);

        if ($validation_input->fails()) {
            return redirect()->back()->withErrors($validation_input)->withInput();
        }

        $split_nama_anggota = explode(',', $request->nama_semua_anggota);

        // Upload data dan mengambil data return
        $upload_data_proposal = General::uploadFile($request->file('proposal'), 'proposal', 'document/proposal');
        $upload_data_cv = General::uploadFile($request->file('cv'), 'cv', 'document/cv');
        $upload_data_surat_pengantar = General::uploadFile($request->file('surat_pengantar'), 'surat_pengantar', 'document/surat_pengantar');

        $request->merge(['cv_upload_path' => $upload_data_cv['file_location']]);
        $request->merge(['cv_file_name' => $request->file('cv')->getClientOriginalName()]);
        $request->merge(['proposal_upload_path' => $upload_data_proposal['file_location']]);
        $request->merge(['proposal_file_name' => $request->file('proposal')->getClientOriginalName()]);
        $request->merge(['surat_pengantar_upload_path' => $upload_data_surat_pengantar['file_location']]);
        $request->merge(['surat_pengantar_file_name' => $request->file('surat_pengantar')->getClientOriginalName()]);

        PengajuanMagang::create([
            'name'  => $request->name,
            'nim' => $request->nim,
            'instansi' => $request->instansi,
            'jurusan_id' => $request->jurusan,
            'user_id' => Auth::user()->id,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'telepon' => $request->telepon,
            'rekomendasi' => $request->rekomendasi,
            'jumlah_total_kelompok' => $request->jumlah_total_kelompok,
            'nama_anggota_kelompok' => json_encode($split_nama_anggota),
            'tujuan' => $request->tujuan,
            'periode_awal' => Carbon::parse($request->periode_awal)->format('Y-m-d'),
            'periode_akhir' => Carbon::parse($request->periode_akhir)->format('Y-m-d'),
            'lama_bulan_pelaksanaan' => $request->lama_pelaksanaan,
            'cv_upload_path' => $request->cv_upload_path,
            'cv_file_name' => $request->cv_file_name,
            'proposal_upload_path' => $request->proposal_upload_path,
            'proposal_file_name' => $request->proposal_file_name,
            'surat_pengantar_upload_path' => $request->surat_pengantar_upload_path,
            'surat_pengantar_file_name' => $request->surat_pengantar_file_name,
        ]);

        // Update fullname di table users
        Auth::user()->update([
            'fullname'  => $request->name
        ]);

        return redirect()
            ->route('mahasiswa.dashboard.index')
            ->with('alert_type', 'success')
            ->with('message', 'Pengajuan magang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanMagang $pengajuan_magang)
    {
        $merge_nama_anggota = '';
        $convert_array = json_decode($pengajuan_magang->nama_anggota_kelompok);

        foreach ($convert_array as $key => $value) {
            $merge_nama_anggota = $merge_nama_anggota . $convert_array[$key];

            if ($key != count($convert_array) - 1) {
                $merge_nama_anggota = $merge_nama_anggota . ',';
            }
        }

        $pengajuan_magang->nama_anggota_kelompok = $merge_nama_anggota;
        $pengajuan_magang->periode_awal = Carbon::parse($pengajuan_magang->periode_awal)->format('d-m-Y');
        $pengajuan_magang->periode_akhir = Carbon::parse($pengajuan_magang->periode_akhir)->format('d-m-Y');

        return view('mahasiswa.pengajuan-magang.edit', compact('pengajuan_magang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanMagang $pengajuan_magang)
    {
        $validation_input = $this->checkValidationInput($request, 'update');

        if ($validation_input->fails()) {
            return redirect()->back()->withErrors($validation_input)->withInput();
        }

        $split_nama_anggota = explode(',', $request->nama_semua_anggota);

        if ($request->file('cv')) {
            (new BerkasPengajuanMagangController)->deleteImage($pengajuan_magang->cv_upload_path);

            $upload_data_cv = General::uploadFile($request->file('cv'), 'cv', 'document/cv');

            $request->merge(['cv_upload_path' => $upload_data_cv['file_location']]);
            $request->merge(['cv_file_name' => $request->file('cv')->getClientOriginalName()]);

            // Update CV jika terdapat upload data
            $pengajuan_magang->update([
                'cv_upload_path' => $request->cv_upload_path,
                'cv_file_name' => $request->cv_file_name,
            ]);
        }

        if ($request->file('proposal')) {
            (new BerkasPengajuanMagangController)->deleteImage($pengajuan_magang->proposal_upload_path);

            $upload_data_proposal = General::uploadFile($request->file('proposal'), 'proposal', 'document/proposal');

            $request->merge(['proposal_upload_path' => $upload_data_proposal['file_location']]);
            $request->merge(['proposal_file_name' => $request->file('proposal')->getClientOriginalName()]);

            // Update proposal jika terdapat upload data
            $pengajuan_magang->update([
                'proposal_upload_path' => $request->proposal_upload_path,
                'proposal_file_name' => $request->proposal_file_name,
            ]);
        }

        if ($request->file('surat_pengantar')) {
            (new BerkasPengajuanMagangController)->deleteImage($pengajuan_magang->surat_pengantar_upload_path);

            $upload_data_surat_pengantar = General::uploadFile($request->file('surat_pengantar'), 'surat-pengantar', 'document/surat-pengantar');

            $request->merge(['surat_pengantar_upload_path' => $upload_data_surat_pengantar['file_location']]);
            $request->merge(['surat_pengantar_file_name' => $request->file('surat_pengantar')->getClientOriginalName()]);

            // Update proposal jika terdapat upload data
            $pengajuan_magang->update([
                'surat_pengantar_upload_path' => $request->surat_pengantar_upload_path,
                'surat_pengantar_file_name' => $request->surat_pengantar_file_name,
            ]);
        }

        $pengajuan_magang->update([
            'name'  => $request->name,
            'nim' => $request->nim,
            'instansi' => $request->instansi,
            'jurusan_id' => $request->jurusan,
            'user_id' => Auth::user()->id,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'telepon' => $request->telepon,
            'rekomendasi' => $request->rekomendasi,
            'jumlah_total_kelompok' => $request->jumlah_total_kelompok,
            'nama_anggota_kelompok' => json_encode($split_nama_anggota),
            'tujuan' => $request->tujuan,
            'periode_awal' => Carbon::parse($request->periode_awal)->format('Y-m-d'),
            'periode_akhir' => Carbon::parse($request->periode_akhir)->format('Y-m-d'),
            'lama_bulan_pelaksanaan' => $request->lama_pelaksanaan,
        ]);

        // Update fullname di table users
        Auth::user()->update([
            'fullname'  => $request->name
        ]);

        return redirect()
            ->route('mahasiswa.dashboard.index')
            ->with('alert_type', 'success')
            ->with('message', 'Pengajuan magang berhasil diupdate');
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
     * Validation for checking input in form
     *
     * @param [type] $request
     * @return object
     */
    private function checkValidationInput($request, $type = 'store')
    {
        $validation = [
            'proposal'         => ['required', 'mimes:pdf', 'file', 'max:2048'],
            'cv'               => ['required', 'mimes:pdf', 'file', 'max:2048'],
            'surat_pengantar'  => ['required', 'mimes:pdf', 'file', 'max:2048'],
        ];

        // untuk keperluan update
        if ($type == 'update') {
            $validation = [
                'proposal'        => ['mimes:pdf', 'file', 'max:2048'],
                'cv'              => ['mimes:pdf', 'file', 'max:2048'],
                'surat_pengantar' => ['mimes:pdf', 'file', 'max:2048'],
            ];
        }

        return Validator::make($request->all(), $validation, [

        ]);
    }
}
