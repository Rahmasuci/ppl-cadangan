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
            $table->integer('kuantitas');
            $table->date('tgl_butuh');
            $table->enum('status', [
                'approve', 'dikirim', 'barang diterima', 'belum dibayar', 'sudah dibayar'
            ]);
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->on('supplier')->references('id')->onUpdate('cascade');
            $table->integer('id_order')->unsigned();
            $table->foreign('id_order')->on('orders')->references('id')->onUpdate('cascade');
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
