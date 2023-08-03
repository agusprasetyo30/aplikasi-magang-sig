<?php

use App\Models\PengajuanMagang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBerkasPengajuanMagangTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pengajuan_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_magang_id')->constrained((new PengajuanMagang())->getTable())->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('surat_pernyataan_upload_path')->nullable();
            $table->text('surat_pernyataan_file_name')->nullable();
            $table->text('surat_panggilan_upload_path')->nullable();
            $table->text('surat_panggilan_file_name')->nullable();
            $table->text('surat_rekomendasi_upload_path')->nullable();
            $table->text('surat_rekomendasi_file_name')->nullable(); 
            $table->text('ktm_upload_path')->nullable();
            $table->text('ktm_file_name')->nullable(); 
            $table->text('surat_sehat_upload_path')->nullable();
            $table->text('surat_sehat_file_name')->nullable(); 
            $table->text('bpjs_upload_path')->nullable();
            $table->text('bpjs_file_name')->nullable(); 
            $table->text('foto_upload_path')->nullable();
            $table->text('foto_file_name')->nullable(); 
            $table->text('twibbon_upload_path')->nullable();
            $table->text('twibbon_file_name')->nullable();
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_pengajuan_magang');
    }
}
