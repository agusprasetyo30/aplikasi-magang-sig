<?php

namespace App\Http\Controllers;

use App\Models\Master\Jurusan;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    public function jurusanSelect2(Request $request)
    {
        $term = $request->q;
    
        // default
        if (empty($term)) {
            $data_jurusan = Jurusan::orderBy('name', 'asc')
                ->get();
        } else {
            $data_jurusan = Jurusan::where('name', 'like', '%' . $term . '%')
                ->orderBy('name', 'asc')
                ->get();
        }

        
        // Digunakan hanya untuk mennampilkan jurusan yang memiliki/terdapat relasi kuota magang
        // ini dieksekusi jika menginginkan data list jurusan yang terdapat relasi pada kuota magang
        if ($request->get('kuota')) {
            if (empty($term)) {
                $data_jurusan = Jurusan::whereHas('kuotaMagang')
                    ->orderBy('name', 'asc')
                    ->get();
            } else {
                $data_jurusan = Jurusan::whereHas('kuotaMagang')
                    ->where('name', 'like', '%' . $term . '%')
                    ->orderBy('name', 'asc')
                    ->get();
            }
        }

        $formatted_units = [];
        foreach ($data_jurusan as $data) {
            $formatted_units['results'][] = ['id' => $data->id, 'text' => $data->name];
        }

        return response()->json($formatted_units);
    }
}
