<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHisBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_his_barang', function (Blueprint $table) {
            $table->date('tanggal');
            $table->string('kode_barang', 6);
            $table->longText('nama');
            $table->integer('stok');
            $table->string('dokumen');
            $table->integer('po_in');
            $table->integer('retur_in');
            $table->integer('series');
            $table->integer('sales_out');
            $table->integer('move_out');
            $table->integer('move_ex');
            $table->integer('retur_out');
            $table->integer('adjusment');
            $table->integer('saldo');
            $table->string('pos', 2);
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
        Schema::dropIfExists('tb_his_barang');
    }
}
