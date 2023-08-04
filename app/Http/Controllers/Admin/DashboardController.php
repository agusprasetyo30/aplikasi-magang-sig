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
    public function index()
    {
        $total_halaman = 5; // total data yang ditampilkan
        $number = General::numberPagination($total_halaman);

        $pengajuan_magang = PengajuanMagang::query();
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
