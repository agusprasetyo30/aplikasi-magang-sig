<?php

namespace App\Models;

use App\Models\Master\Jurusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanMagang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pengajuan_magang';

    protected $fillable = [
        'name',
        'nim',
        'instansi',
        'jurusan_id',
        'user_id',
        'jenjang_pendidikan',
        'telepon',
        'rekomendasi',
        'jumlah_total_kelompok',
        'nama_anggota_kelompok',
        'tujuan',
        'ajuan_topik',
        'periode_awal',
        'periode_akhir',
        'lama_bulan_pelaksanaan',
        'cv_upload_path',
        'cv_file_name',
        'proposal_upload_path',
        'proposal_file_name',
        'status'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function berkasPengajuanMagang()
    {
        return $this->hasOne(BerkasPengajuanMagang::class);
    }
}
