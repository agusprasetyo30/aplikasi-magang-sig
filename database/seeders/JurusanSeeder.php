<?php

namespace Database\Seeders;

use App\Models\Master\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'Teknik Informatika',
            'Sistem Informasi Bisnis',
            'Ilmu Komunikasi',
            'Psikologi',
            'Teknik Sipil',
            'Ilmu Hukum',
            'Teknik Mesin',
            'Teknik Listrik',
            'Teknik Elektronika'
        ];

        for ($i=0; $i < count($arr); $i++) { 
            Jurusan::create([
                'name'  => $arr[$i]
            ]);
        }
        echo "Data berhasil diinput sebanyak : " . count($arr);
    }
}
