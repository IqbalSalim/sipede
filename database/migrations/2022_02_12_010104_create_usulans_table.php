<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onUpdate('cascade')->onDelete('cascade');
            $table->year('tahun');
            $table->string('status')->default('verifikasi');
            $table->string('lokasi')->nullable();
            $table->string('sdgs', 50)->nullable();
            $table->integer('volume')->nullable();
            $table->string('satuan', 50)->nullable();
            $table->string('waktu')->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->string('sumber')->nullable();
            $table->string('pola')->nullable();
            $table->string('rencana')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulans');
    }
}
