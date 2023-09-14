<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\PengajuanMagang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        $total_halaman = 5; // total data yang ditampilkan
        $number = General::numberPagination($total_halaman);

        $pengajuan_magang = PengajuanMagang::query()->orderBy('created_at', 'desc');

        // Jika pencarian nama / instansi
        if ($request->get('name')) {
            $pengajuan_magang = $pengajuan_magang->where('name', 'like', '%' . $request->get('name') . '%')
                ->orWhere('instansi', 'like', '%' . $request->get('name') . '%');
        }

        // jika mencari berdasarkan status
        if ($request->get('status')) {
            $pengajuan_magang = $pengajuan_magang->where('status', $temp_status);
        }

        // jika pencarian dua-duanya
        if (!is_null($request->get('name')) && !is_null($request->get('status'))) {
            $pengajuan_magang = $pengajuan_magang->where('name', 'like', '%' . $request->get('name') . '%')
                ->orWhere('instansi', 'like', '%' . $request->get('name') . '%')
                ->where('status', $temp_status);
        }

        $total_mahasiswa = $this->hitungTotalMahasiswa($pengajuan_magang->get());
        $total_pengajuan_magang = $pengajuan_magang->get()->count();

        $pengajuan_magang = $pengajuan_magang->paginate($total_halaman);

        return view('admin.dashboard.index', compact('pengajuan_magang', 'number', 'total_mahasiswa', 'total_pengajuan_magang'));
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

    private function hitungTotalMahasiswa($pengajuan_magang)
    {
        $total = 0;
        foreach ($pengajuan_magang as $value) {
            $total = $total + ($value->jumlah_total_kelompok);
        }

        return $total;
    }
}
