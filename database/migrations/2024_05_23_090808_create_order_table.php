<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_session');
            $table->unsignedBigInteger('id_payment');
            $table->unsignedBigInteger('nik');
            $table->unsignedBigInteger('id_admin');
            $table->string('status');
            $table->foreign('id_paket')->references('id_paket')->on('paket')->onDelete('cascade');
            $table->foreign('id_session')->references('id_session')->on('session')->onDelete('cascade');
            $table->foreign('id_payment')->references('id_payment')->on('payment')->onDelete('cascade');
            $table->foreign('nik')->references('nik')->on('pemesan')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
}
