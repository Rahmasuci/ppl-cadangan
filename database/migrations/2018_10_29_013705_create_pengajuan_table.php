<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->integer('hrg');
            $table->enum('status', [
                'belum diterima', 'diterima', 'tidak diterima', 'barang diterima', 'belum dibayar', 'sudah dibayar', 'selesai'
            ]); 
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->on('supplier')->references('id')->onUpdate('cascade');
            $table->integer('id_penawaran')->unsigned();
            $table->foreign('id_penawaran')->on('penawaran')->references('id')->onUpdate('cascade');
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
        Schema::dropIfExists('pengajuan');
    }
}
