<?php

namespace App\Models\Master;

use App\Models\PengajuanMagang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory;
    use SoftDeletes;


    
    protected $fillable = [
        'name', 
        'description'
    ];

    public function pengajuanMagang()
    {
        return $this->hasOne(PengajuanMagang::class);
    }
}
