<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BerkasPesertaMagang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'berkas_peserta_magang';

    protected $fillable = [
        'pengajuan_magang_id',
        'surat_panggilan_upload_path',
        'surat_panggilan_file_name',
        'absensi_upload_path',
        'absensi_file_name',
        'surat_persetujuan_upload_path',
        'surat_persetujuan_file_name',
        'lampiran_surat_persetujuan_upload_path',
        'lampiran_surat_persetujuan_file_name',
        'id_card_upload_path',
        'id_card_file_name',
        'form_bimbingan_upload_path',
        'form_bimbingan_file_name',
        'upload_by',
    ];

    public function pengajuanMagang()
    {
        return $this->belongsTo(PengajuanMagang::class);
    }
}
