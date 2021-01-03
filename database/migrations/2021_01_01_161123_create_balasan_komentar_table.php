<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalasanKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balasan_komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('isi_komentar');
            $table->bigInteger('komentar_id')->unsigned();
            $table->foreign('komentar_id')->references('id')->on('komentar')->onDelete('cascade')->onUpdate('cascade');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balasan_komentar');
    }
}