<?php

use App\Models\Master\Jurusan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanMagangTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_magang', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nim', 20);
            $table->string('instansi', 100);
            $table->foreignId('jurusan_id')->constrained((new Jurusan())->getTable())->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained((new User())->getTable())->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('jenjang_pendidikan', 20);
            $table->string('rekomendasi', 100)->nullable();
            $table->integer('jumlah_total_kelompok');
            $table->json('nama_anggota_kelompok');
            $table->text('tujuan')->nullable();
            $table->string('ajuan_topik')->nullable();
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->integer('lama_bulan_pelaksanaan')->comment('ini dimasukan dalam bentuk bulan, ex: 1 = 1 bulan');
            $table->text('cv_upload_path')->nullable();
            $table->text('cv_origin_filename')->nullable();
            $table->text('cv_file_name')->nullable();
            $table->text('proposal_upload_path')->nullable();
            $table->text('proposal_origin_filename')->nullable();
            $table->text('proposal_file_name')->nullable();

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
        Schema::dropIfExists('pengajuan_magang');
    }
}
