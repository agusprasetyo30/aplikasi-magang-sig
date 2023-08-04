<?php

use App\Models\Master\Jurusan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuotaMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuota_magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained((new Jurusan())->getTable())->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('jenjang_pendidikan');
            $table->integer('kuota')->default(0);
            $table->integer('bulan_pelaksanaan')->comment('Data yang dimasukan adalah data bulan dalam bentuk angka');

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
        Schema::dropIfExists('kuota_magang');
    }
}
