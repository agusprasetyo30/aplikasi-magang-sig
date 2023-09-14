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
        'periode_awal',
        'periode_akhir',
        'lama_bulan_pelaksanaan',
        'cv_upload_path',
        'cv_file_name',
        'proposal_upload_path',
        'proposal_file_name',
        'surat_pengantar_upload_path',
        'surat_pengantar_file_name',
        'status',
        'pengumuman'
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

    public function berkasPesertaMagang()
    {
        return $this->hasOne(BerkasPesertaMagang::class);
    }
}
