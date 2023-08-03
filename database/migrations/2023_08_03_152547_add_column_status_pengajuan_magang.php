<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusPengajuanMagang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            $table->enum('status', [0,1,2])
                ->default(0)
                ->comment('0: pending, 1: disetujui, 2: ditolak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
}
