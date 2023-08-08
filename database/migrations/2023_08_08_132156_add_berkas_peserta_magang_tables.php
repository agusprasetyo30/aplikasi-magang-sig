<?php

use App\Models\PengajuanMagang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBerkasPesertaMagangTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_peserta_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_magang_id')->constrained((new PengajuanMagang())->getTable())->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('surat_panggilan_upload_path')->nullable();
            $table->text('surat_panggilan_file_name')->nullable();
            $table->text('absensi_upload_path')->nullable();
            $table->text('absensi_file_name')->nullable(); 
            $table->text('surat_persetujuan_upload_path')->nullable();
            $table->text('surat_persetujuan_file_name')->nullable(); 
            $table->text('lampiran_surat_panggilan_upload_path')->nullable();
            $table->text('lampiran_surat_panggilan_file_name')->nullable(); 
            $table->text('id_card_upload_path')->nullable();
            $table->text('id_card_file_name')->nullable(); 
            $table->text('form_bimbingan_upload_path')->nullable();
            $table->text('form_bimbingan_file_name')->nullable(); 
            $table->json('upload_by')->nullable();

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
        Schema::dropIfExists('berkas_peserta_magang');
    }
}
