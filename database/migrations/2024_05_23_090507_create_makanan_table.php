<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakananTable extends Migration
{
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->id('id_makanan');
            $table->string('nama_makanan');
            $table->decimal('harga_makanan', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makanan');
    }
}
