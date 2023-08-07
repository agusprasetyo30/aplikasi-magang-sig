<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Master\Jurusan;
use App\Models\MJurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
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
        
        $jurusan = Jurusan::query();

        if ($request->get('jurusan_name')) {
            $jurusan = $jurusan->where('name', 'like', '%' . $request->get('jurusan_name') . '%')->paginate($jumlah_halaman);
        }

        return view('admin.jurusan.index', compact('number', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jurusan::create($request->all());

        return redirect()
            ->route('admin.jurusan.index')
            ->with('alert_type', 'success')
            ->with('message', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MJurusan  $mJurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MJurusan  $mJurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MJurusan  $mJurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $jurusan->update($request->all());

        return redirect()
            ->route('admin.jurusan.index')
            ->with('alert_type', 'success')
            ->with('message', 'Jurusan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MJurusan  $mJurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('alert_type', 'success')
            ->with('message', 'Jurusan berhasil dihapus');
    }
}
