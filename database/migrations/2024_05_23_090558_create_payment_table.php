<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id('id_payment');
            $table->decimal('nominal_pembayaran', 10, 2);
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment');
    }
}//
