<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSuratPengantar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_magang', function (Blueprint $table) {
            $table->text('surat_pengantar_upload_path')->nullable()->after('proposal_file_name');
            $table->text('surat_pengantar_file_name')->nullable()->after('surat_pengantar_upload_path');
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
            $table->dropColumn(['surat_pengantar_upload_path', 'surat_pengantar_file_name']);
        });
    }
}
