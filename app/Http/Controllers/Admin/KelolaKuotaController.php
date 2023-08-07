<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\KuotaMagang;
use Illuminate\Http\Request;

class KelolaKuotaController extends Controller
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

        $kelola_kuota = KuotaMagang::paginate($jumlah_halaman);

        if (!is_null($request->jurusan)) {            
            $kelola_kuota = KuotaMagang::whereHas('jurusan', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->get('jurusan') . '%');
            })->paginate($jumlah_halaman);
        }

        return view('admin.kelola-kuota.index', compact('number', 'kelola_kuota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelola-kuota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KuotaMagang::create([
            'jurusan_id'         => $request->jurusan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'kuota'              => $request->kuota,
            'bulan_pelaksanaan'  => $request->bulan_pelaksanaan
        ]);

        return redirect()
            ->route('admin.kelola-kuota.index')
            ->with('alert_type', 'success')
            ->with('message', 'Kelola kuota  berhasil ditambahkan');
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
        $kelola_kuota = KuotaMagang::where('id', $id)->first();

        return view('admin.kelola-kuota.edit', compact('kelola_kuota'));
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
        KuotaMagang::where('id', $id)->update([
            'jurusan_id'         => $request->jurusan,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'kuota'              => $request->kuota,
            'bulan_pelaksanaan'  => $request->bulan_pelaksanaan
        ]);

        return redirect()
            ->route('admin.kelola-kuota.index')
            ->with('alert_type', 'success')
            ->with('message', 'Kelola kuota berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KuotaMagang::where('id', $id)->delete();

        return redirect()
            ->route('admin.kelola-kuota.index')
            ->with('alert_type', 'success')
            ->with('message', 'Data berhasil dihapus');
    }
}
