<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->String('kuantitas');
            $table->integer('total');
            $table->integer('id_order')->unsigned();
            $table->foreign('id_order')->on('orders')->references('id')->onUpdate('cascade');
            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->on('products')->references('id')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
