<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutTable extends Migration
{
    public function up()
    {
        Schema::create('layout', function (Blueprint $table) {
            $table->id('id_layout');
            $table->string('nama_layout');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlahOrang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layout');
    }
}
