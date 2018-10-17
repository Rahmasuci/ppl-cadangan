<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->String('alamat_pengiriman');
            $table->timestamp('tgl_pesan');
            $table->date('batas_pengiriman');
            $table->date('tgl_kirim');
            $table->date('tgl_selesai');
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->on('pelanggan')->references('id')->onUpdate('cascade');
            $table->enum('status', ['belum bayar', 'dikirim', 'dalam proses', 'batal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
