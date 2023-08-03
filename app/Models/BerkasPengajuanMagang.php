<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPengajuanMagang extends Model
{
    use HasFactory;

    protected $table = 'berkas_pengajuan_magang';

    protected $fillable = [
        'pengajuan_magang_id',
        'surat_pernyataan_upload_path',
        'surat_pernyataan_file_name',
        'surat_panggilan_upload_path',
        'surat_panggilan_file_name',
        'surat_rekomendasi_upload_path',
        'surat_rekomendasi_file_name',
        'ktm_upload_path',
        'ktm_file_name',
        'surat_sehat_upload_path',
        'surat_sehat_file_name',
        'bpjs_upload_path',
        'bpjs_file_name',
        'foto_upload_path',
        'foto_file_name',
        'twibbon_upload_path',
        'twibbon_file_name',
    ];

    public function pengajuanMagang()
    {
        return $this->belongsTo(PengajuanMagang::class);
    }
}
