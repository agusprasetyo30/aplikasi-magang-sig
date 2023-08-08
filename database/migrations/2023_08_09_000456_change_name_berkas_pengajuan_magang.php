<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameBerkasPengajuanMagang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas_pengajuan_magang', function (Blueprint $table) {
            $table->text('surat_rekomendasi_upload_path')->comment('untuk kolom ini diganti (Upload Surat Persetujuan yang sudah di Tanda Tangan)')->change();
            $table->text('surat_rekomendasi_file_name')->comment('untuk kolom ini diganti (Upload Surat Persetujuan yang sudah di Tanda Tangan)')->change();
            $table->text('bpjs_upload_path')->comment('untuk kolom ini diganti (Upload Asuransi Kecelakaan Kerja)')->change();
            $table->text('bpjs_file_name')->comment('untuk kolom ini diganti (Upload Asuransi Kecelakaan Kerja)')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berkas_pengajuan_magang', function (Blueprint $table) {
            //
        });
    }
}
