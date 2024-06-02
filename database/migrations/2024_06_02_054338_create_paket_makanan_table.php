<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket_makanan', function (Blueprint $table) {
            $table->id('id_paket_makanan');
            $table->string('nama_paket_makanan');
            $table->decimal('harga_total',10,2);
            $table->json('id_makanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_makanan');
    }
};
