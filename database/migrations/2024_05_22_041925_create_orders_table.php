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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('idOrder');
            $table->date('tanggal');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('namaPemesan');
            $table->string('noPemesan');
            $table->timestamps();

            $table->foreign('paket_id')->references('idPaket')->on('pakets');
            $table->foreign('session_id')->references('idSession')->on('sessions');
            $table->foreign('payment_id')->references('idPayment')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
