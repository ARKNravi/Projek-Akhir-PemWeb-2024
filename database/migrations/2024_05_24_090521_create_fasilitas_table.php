<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->string('nama_fasilitas');
            $table->integer('kapasitas');
            $table->integer('lama_waktu_peminjaman');
            $table->json('materials');
            $table->unsignedBigInteger('id_ruangan');
            $table->unsignedBigInteger('id_makanan');
            $table->unsignedBigInteger('nomor_kamar');

            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
            $table->foreign('id_makanan')->references('id_makanan')->on('makanan')->onDelete('cascade');
            $table->foreign('nomor_kamar')->references('nomor_kamar')->on('kamar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
}
//
