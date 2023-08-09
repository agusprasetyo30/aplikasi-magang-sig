<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\BerkasPesertaMagang;
use App\Models\PengajuanMagang;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Storage;

class DashboardController extends Controller
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

        $pengajuan_magang = PengajuanMagang::where('user_id', Auth::user()->id)->paginate($jumlah_halaman);

        // dd($pengajuan_magang);
        return view('mahasiswa.dashboard.index', compact('pengajuan_magang', 'number'));
    }

    public function downloadBerkasMagang()
    {
        return view('mahasiswa.dashboard.download_berkas', [
            'berkas_peserta_magang' => Auth::user()->pengajuanMagang->berkasPesertaMagang
        ]);
    }

    /**
     * Fungsi untuk upload foto profil
     *
     * @param Request $request
     * @return void
     */
    public function uploadPhoto(Request $request)
    {
        if ($request->file('upload_foto')) {
            // Delete Photo
            if (!is_null(Auth::user()->photo_upload_path) && file_exists(storage_path('app/public/' . Auth::user()->photo_upload_path))) {
                Storage::delete('public/' . Auth::user()->photo_upload_path);
            }

            $photo_upload_path = General::uploadImage($request->file('upload_foto'), 512, 512, 'foto-profil', 'document/user-photo');
            
            Auth::user()->update([
                'photo_upload_path' => $photo_upload_path
            ]);
        }

        return redirect()
            ->route('mahasiswa.dashboard.index')
            ->with('alert_type', 'success')
            ->with('message', 'Update foto success');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param PengajuanMagang $pengajuan_magang
     * @param [type] $type
     * @return void
     */
    public function downloadFile($type)
    {
        $berkas_peserta_magang = BerkasPesertaMagang::where('pengajuan_magang_id', Auth::user()->pengajuanMagang->id)->first();
        $path = '';

        switch ($type) {
            case 'surat-panggilan':
                $path = $berkas_peserta_magang->surat_panggilan_upload_path;
                break;

            case 'absensi':
                $path = $berkas_peserta_magang->absensi_upload_path;
                break;

            case 'surat-persetujuan':
                $path = $berkas_peserta_magang->surat_persetujuan_upload_path;
                break;

            case 'lampiran-surat-panggilan':
                $path = $berkas_peserta_magang->lampiran_surat_panggilan_upload_path;
                break;

            case 'id-card':
                $path = $berkas_peserta_magang->id_card_upload_path;
                break;

            case 'form-bimbingan':
                $path = $berkas_peserta_magang->form_bimbingan_upload_path;
                break;
            
            default:
                return abort(404);
                break;
        }

        // dd($berkas_peserta_magang, $type);
        // return response()->download(storage_path('document/surat-panggilan/surat-panggilan1691563115.pdf'));
        return Storage::download('public/' . $path);
        // return Storage::disk('public')->download(asset('storage/document/surat-panggilan/surat-panggilan1691563115.pdf'));
        // return response()->download(storage_path('document/surat-panggilan/surat-panggilan1691563115.pdf'));
    }
}
