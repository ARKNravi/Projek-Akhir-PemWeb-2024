<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('nomor_kamar');
            $table->string('tipe');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
