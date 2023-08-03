<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnOriginInPengajuanMagang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            $table->dropColumn(['proposal_origin_filename', 'cv_origin_filename']);
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
            $table->text('proposal_origin_filename')->nullable();
            $table->text('cv_origin_filename')->nullable();
        });
    }
}
