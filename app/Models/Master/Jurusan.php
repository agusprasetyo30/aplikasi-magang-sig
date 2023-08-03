<?php

namespace App\Models\Master;

use App\Models\PengajuanMagang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description'
    ];

    public function pengajuanMagang()
    {
        return $this->hasOne(PengajuanMagang::class);
    }
}
