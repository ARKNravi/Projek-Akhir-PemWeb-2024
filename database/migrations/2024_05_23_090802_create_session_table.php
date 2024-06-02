<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTable extends Migration
{
    public function up()
    {
        Schema::create('session', function (Blueprint $table) {
            $table->id('id_session');
            $table->date('tanggal');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('session');
    }
}//
