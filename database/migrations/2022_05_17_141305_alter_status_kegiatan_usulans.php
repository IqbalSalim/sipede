<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStatusKegiatanUsulans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usulans', function (Blueprint $table) {
            $table->enum('status_kegiatan', ['terlaksana', 'belum terlaksana'])->default('belum terlaksana')->after('keterangan')->nullable();
        });
    }
}
