<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuanganTable extends Migration
{
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruangan');
            $table->string('nama_ruangan');
            $table->integer('kapasitas');
            $table->decimal('harga', 10, 2);
            $table->string('backdrop')->nullable();
            $table->unsignedBigInteger('id_layout');
            $table->timestamps();

            $table->foreign('id_layout')->references('id_layout')->on('layout')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('ruangan');
    }
}//