<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLogBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_log_barang', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->date('tanggal');
            $table->string('uraian', 15);
            $table->string('kode_barang', 5);
            $table->integer('stok_awal');
            $table->string('jenis', 3);
            $table->integer('stok_akhir');
            $table->longText('note');
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
        Schema::dropIfExists('tb_log_barang');
    }
}
