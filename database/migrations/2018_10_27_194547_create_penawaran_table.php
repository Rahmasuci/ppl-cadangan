<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenawaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty_butuh');
            $table->integer('hrg_max');
            $table->enum('status', [
                'cari supplier', 'selesai', 'sudah diverifikasi','dikirim', 'barang diterima', 'belum dibayar', 'sudah dibayar'
            ]);
            $table->integer('id_detail')->unsigned();
            $table->foreign('id_detail')->on('order_detail')->references('id')->onUpdate('cascade');
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
        Schema::dropIfExists('penawaran');
    }
}
