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
    private static $PENGUMUMAN_DISETUJUI_DEFAULT = "<div>PENGUMUMAN!!!</div><div>Dengan Hormat,</div><div><br></div><div>Sehubungan dengan pengisian Ajuan Kerja Praktek/Penelitian yang telah Bapak/Ibu/Saudara/i isi, maka dengan ini kami informasikan, ajuan sudah kami terima.</div><div><br></div><div>Kerja Praktek Mahasiwa berdurasi 3 bulan dan 1 kelompok maksimal 3 orang,</div><div>Kerja Praktek SMK berdurasi 3 bulan dan 1 kelompok maksimal 4 orang.</div><div><br></div><div>Proses disetujui atau tidak disetujui Kerja Praktek/Penelitian, menunggu balasan persetujuan Pembimbing.</div><div>&nbsp;</div><div>Demikian yang dapat kami sampaikan, terima kasih.</div><div><br></div><div><br></div><div><br></div><div>Hormat kami,</div><div><br></div><div>Unit of L&amp;D Operational</div><div>PT Semen Indonesia (Persero) Tbk.</div>";
    private static $PENGUMUMAN_DITOLAK_DEFAULT = "<div>PENGUMUMAN!!!</div><div>Dengan Hormat</div><div><br></div><div>Berikut kami sampaikan mekanisme kerja praktek, sesuai prosedur yang berlaku di Unit Kerja L&amp;D Ops and Certification terlampir.</div><div><br></div><div>Sebagai informasi, untuk Kerja Praktek/ Penelitian di Bulan Oktober 2023 - Maret 2024 telah kami tutup dikarenakan KUOTA FULL, Sehingga kami belum dapat menerima kerja praktek untuk bulan-bulan tersebut.</div><div><br></div><div>Kerja Praktek/Penelitian dibuka kembali untuk Bulan April 2024,&nbsp;</div><div><br></div><div><br></div><div>Demikian yang dapat kami sampaikan, terima kasih.</div><div><br></div><div><br></div><div>Hormat kami,</div><div><br></div><div>Unit of L&amp;D Operational</div><div>PT Semen Indonesia (Persero) Tbk.</div>";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getMonthYear = explode('-', $request->periode) ?? '';
        $jumlah_halaman = 5;
        $number = General::numberPagination($jumlah_halaman);

        $temp_status = ''; // digunakan untuk get data status

        switch ($request->get('status')) {
            case 'pending':
                $temp_status = '0';
                break;
            case 'disetujui':
                $temp_status = '1';
                break;
            case 'ditolak':
                $temp_status = '2';
                break;
        }

        $peserta_magang = PengajuanMagang::query();

        // jika pencariannya digunakan bersama
        if (!is_null($request->search) && !is_null($request->periode) && !is_null($request->status)) {
             // Pencarian nama, jurusan/prodi, dan universitas/instansi
            $peserta_magang = $peserta_magang
                ->where('status', $temp_status)
                ->whereMonth('created_at', '=', $getMonthYear[0]) //month
                ->whereYear('created_at', '=', $getMonthYear[1]) // year
                ->where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('instansi', 'like', '%' . $request->get('search') . '%')
                ->whereHas('jurusan', function($q) use ($request) {
                    $q->orWhere('name', 'like', '%' . $request->get('search') . '%');
                });
        }

        // pencarian untuk input pencarian
        if (!is_null($request->search)) {
            // Pencarian nama, jurusan/prodi, dan universitas/instansi
            $peserta_magang = $peserta_magang->whereHas('jurusan', function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->get('search') . '%');
                })
                ->orWhere('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('instansi', 'like', '%' . $request->get('search') . '%');
        }

        // Pencarian jika hanya memilih periode
        if (!is_null($request->periode)) {
            $peserta_magang = PengajuanMagang::with('jurusan')
                ->whereMonth('created_at', '=', $getMonthYear[0]) //month
                ->whereYear('created_at', '=', $getMonthYear[1]); //year
        }

        // Filter Status
        if (!is_null($request->status)) {
            $peserta_magang = PengajuanMagang::with('jurusan')
                ->where('status', $temp_status);
        }

        $peserta_magang = $peserta_magang->paginate($jumlah_halaman);

        return view('admin.peserta-magang.index', compact('number', 'peserta_magang'));
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $peserta_magang = PengajuanMagang::where('id', $id)->first();

        return view('admin.peserta-magang.edit', compact('peserta_magang'));
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $peserta_magang = PengajuanMagang::where('id', $id)->first();
        $temp_pengumuman = '';

        switch ($request->status) {
            case '1': // Diterima
                $temp_pengumuman = self::$PENGUMUMAN_DISETUJUI_DEFAULT;
                break;
            case '2':
                $temp_pengumuman = self::$PENGUMUMAN_DITOLAK_DEFAULT;
                break;
        }

        if (!is_null($request->pengumuman)) {
            $temp_pengumuman = $request->pengumuman;
        }

        $peserta_magang->update([
            'status'     => $request->status,
            'pengumuman' => $temp_pengumuman
        ]);

        return redirect()
                ->route('admin.peserta-magang.index')
                ->with('alert_type', 'success')
                ->with('message', 'Update data mahasiswa sukses');
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
            $pengumuman_default = '';

            switch ($type) {
                case 'approve':
                    $status_approval = '1';
                    $pengumuman_default = self::$PENGUMUMAN_DISETUJUI_DEFAULT;

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
                    $pengumuman_default = self::$PENGUMUMAN_DITOLAK_DEFAULT;

                    break;
            }

            PengajuanMagang::where('id', $id)->update([
                'status'  => $status_approval,
                'pengumuman' => $pengumuman_default
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
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function checkStatus($value)
    {
        switch ($value) {
            case 'pending':
                return '0';
                break;
            case 'disetujui':
                return '1';
                break;
            case 'ditolak':
                return '2';
                break;
        }
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
            'surat_panggilan'   => ['mimes:pdf', 'file', 'max:2048'],
            'absensi'           => ['mimes:pdf,xlsx', 'file', 'max:2048'],
            'surat_persetujuan' => ['mimes:pdf', 'file', 'max:2048'],
            'lampiran_surat_panggilan' => ['mimes:pdf', 'file', 'max:2048'],
            'id_card'           => ['mimes:pdf', 'file', 'max:2048'],
            'form_bimbingan'    => ['mimes:pdf,xlsx', 'file', 'max:2048'],
        ];

        return Validator::make($request->all(), $validation);
    }
}
