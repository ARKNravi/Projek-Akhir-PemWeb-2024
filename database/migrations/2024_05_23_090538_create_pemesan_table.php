<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanTable extends Migration
{
    public function up()
    {
        Schema::create('pemesan', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('tipe');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesan');
    }
}//
