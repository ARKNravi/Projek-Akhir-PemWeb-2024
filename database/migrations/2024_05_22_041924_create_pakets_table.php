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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id('idPaket');
            $table->string('namaPaket');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('kamar_id');
            $table->integer('harga');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('ruangan_id')->references('idRuangan')->on('ruangans');
            $table->foreign('kamar_id')->references('idKamar')->on('kamars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};