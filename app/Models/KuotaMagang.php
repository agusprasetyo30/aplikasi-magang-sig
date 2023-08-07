<?php

namespace App\Models;

use App\Models\Master\Jurusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KuotaMagang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kuota_magang';

    protected $fillable = [
        'jurusan_id',
        'jenjang_pendidikan',
        'kuota',
        'bulan_pelaksanaan'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class)->withTrashed();
    }
}
