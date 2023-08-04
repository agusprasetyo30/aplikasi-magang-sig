<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Helpers\General;
use App\Http\Controllers\Controller;
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
        return view('mahasiswa.dashboard.download_berkas');
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
}
