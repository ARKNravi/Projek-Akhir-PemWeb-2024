<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTable extends Migration
{
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id('id_paket');
            $table->string('nama');
            $table->decimal('harga_total', 10, 2);
            $table->unsignedBigInteger('id_ruangan');
            $table->json('id_makanan'); // Store multiple makanan IDs as JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paket');
    }
}