<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\BerkasPengajuanMagang;
use Auth;
use Illuminate\Http\Request;
use Validator;

class BerkasPengajuanMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('mahasiswa.upload-berkas.edit', Auth::user()->pengajuanMagang->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.upload-berkas.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berkas_pengajuan_magang = BerkasPengajuanMagang::where('pengajuan_magang_id', $id)->first();
        
        return view('mahasiswa.upload-berkas.edit', compact('berkas_pengajuan_magang'));
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
        $berkas_pengajuan_magang = BerkasPengajuanMagang::where('pengajuan_magang_id', $id)->first();

        // Validasi
        $validation_input = $this->checkValidationInput($request);

        if ($validation_input->fails()) {
            return redirect()->back()->withErrors($validation_input)->withInput();
        }

        // Proses uploading
        if ($request->file('surat_pernyataan')) {
            $upload_data_surat_pernyataan = General::uploadFile($request->file('surat_pernyataan'), 'surat-pernyataan', 'document/surat-pernyataan');

            $request->merge(['surat_pernyataan_upload_path' => $upload_data_surat_pernyataan['file_location']]);
            $request->merge(['surat_pernyataan_file_name' => $request->file('surat_pernyataan')->getClientOriginalName()]);

            $berkas_pengajuan_magang->update([
                'surat_pernyataan_upload_path' => $request->surat_pernyataan_upload_path,
                'surat_pernyataan_file_name'   => $request->surat_pernyataan_file_name
            ]);
        }
        
        if ($request->file('surat_panggilan')) {
            $upload_data_surat_panggilan = General::uploadFile($request->file('surat_panggilan'), 'surat-panggilan', 'document/surat-panggilan');

            $request->merge(['surat_panggilan_upload_path' => $upload_data_surat_panggilan['file_location']]);
            $request->merge(['surat_panggilan_file_name' => $request->file('surat_panggilan')->getClientOriginalName()]);
        
            $berkas_pengajuan_magang->update([
                'surat_panggilan_upload_path' => $request->surat_panggilan_upload_path,
                'surat_panggilan_file_name'   => $request->surat_panggilan_file_name
            ]);
        }
        
        if ($request->file('surat_rekomendasi')) {
            $upload_data_surat_rekomendasi = General::uploadFile($request->file('surat_rekomendasi'), 'surat-rekomendasi', 'document/surat-rekomendasi');

            $request->merge(['surat_rekomendasi_upload_path' => $upload_data_surat_rekomendasi['file_location']]);
            $request->merge(['surat_rekomendasi_file_name' => $request->file('surat_rekomendasi')->getClientOriginalName()]);
            
            $berkas_pengajuan_magang->update([
                'surat_rekomendasi_upload_path' => $request->surat_rekomendasi_upload_path,
                'surat_rekomendasi_file_name'   => $request->surat_rekomendasi_file_name
            ]);
        }

        if ($request->file('ktm')) {
            $upload_data_ktm = General::uploadFile($request->file('ktm'), 'ktm', 'document/ktm');

            $request->merge(['ktm_upload_path' => $upload_data_ktm['file_location']]);
            $request->merge(['ktm_file_name' => $request->file('ktm')->getClientOriginalName()]);

            $berkas_pengajuan_magang->update([
                'ktm_upload_path' => $request->ktm_upload_path,
                'ktm_file_name'   => $request->ktm_file_name
            ]);
        }
        
        if ($request->file('surat_sehat')) {
            $upload_data_surat_sehat = General::uploadFile($request->file('surat_sehat'), 'surat-sehat', 'document/surat-sehat');

            $request->merge(['surat_sehat_upload_path' => $upload_data_surat_sehat['file_location']]);
            $request->merge(['surat_sehat_file_name' => $request->file('surat_sehat')->getClientOriginalName()]);
            
            $berkas_pengajuan_magang->update([
                'surat_sehat_upload_path' => $request->surat_sehat_upload_path,
                'surat_sehat_file_name'   => $request->surat_sehat_file_name
            ]);
        }

        if ($request->file('bpjs')) {
            $upload_data_bpjs = General::uploadFile($request->file('bpjs'), 'bpjs', 'document/bpjs');

            $request->merge(['bpjs_upload_path' => $upload_data_bpjs['file_location']]);
            $request->merge(['bpjs_file_name' => $request->file('bpjs')->getClientOriginalName()]);

            $berkas_pengajuan_magang->update([
                'bpjs_upload_path' => $request->bpjs_upload_path,
                'bpjs_file_name'   => $request->bpjs_file_name
            ]);
        }

        if ($request->file('foto')) {
            $upload_data_foto = General::uploadFile($request->file('foto'), 'foto', 'document/foto');

            $request->merge(['foto_upload_path' => $upload_data_foto['file_location']]);
            $request->merge(['foto_file_name' => $request->file('foto')->getClientOriginalName()]);

            $berkas_pengajuan_magang->update([
                'foto_upload_path' => $request->foto_upload_path,
                'foto_file_name'   => $request->foto_file_name
            ]);
        }

        if ($request->file('twibbon')) {
            $upload_data_twibbon = General::uploadFile($request->file('twibbon'), 'twibbon', 'document/twibbon');

            $request->merge(['twibbon_upload_path' => $upload_data_twibbon['file_location']]);
            $request->merge(['twibbon_file_name' => $request->file('twibbon')->getClientOriginalName()]);

            $berkas_pengajuan_magang->update([
                'twibbon_upload_path' => $request->twibbon_upload_path,
                'twibbon_file_name'   => $request->twibbon_file_name
            ]);
        }

        return redirect()
            ->route('mahasiswa.upload-berkas.edit', $berkas_pengajuan_magang->id)
            ->with('alert_type', 'success')
            ->with('message', 'Data berkas berhasil diupload');
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
            'surat_pernyataan'   => ['mimes:pdf', 'file', 'max:2048'],
            'surat_panggilan'    => ['mimes:pdf', 'file', 'max:2048'],
            'surat_rekomendasi'  => ['mimes:pdf', 'file', 'max:2048'],
            'ktm'                => ['mimes:pdf', 'file', 'max:2048'],
            'surat_sehat'        => ['mimes:pdf', 'file', 'max:2048'],
            'bpjs'               => ['mimes:pdf', 'file', 'max:2048'],
            'foto'               => ['mimes:pdf', 'file', 'max:2048'],
            'twibbon'            => ['mimes:pdf', 'file', 'max:2048'],
        ];

        return Validator::make($request->all(), $validation, [
            
        ]);
    }
}
