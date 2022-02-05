<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subbidang_id')->constrained('subbidangs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kd_rek', 10);
            $table->string('nama');
            $table->string('lokasi')->nullable();
            $table->string('sdgs', 50)->nullable();
            $table->integer('volume')->nullable();
            $table->string('satuan', 50)->nullable();
            $table->string('waktu')->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->string('sumber')->nullable();
            $table->string('pola')->nullable();
            $table->string('rencana')->nullable();
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
        Schema::dropIfExists('kegiatans');
    }
}
