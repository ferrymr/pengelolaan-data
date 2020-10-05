<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mutasi', function (Blueprint $table) {
            $table->string('kode_m', 15)->primary();
            $table->date('tanggal')->nullable();
            $table->string('jenis', 10)->nullable();
            $table->string('dari', 5)->nullable();
            $table->string('ke', 5)->nullable();
            $table->string('kode_barang', 6)->nullable();
            $table->string('nama', 70)->nullable();
            $table->integer('jumlah')->nullable();
            $table->longText('keterangan')->nullable();
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
        Schema::dropIfExists('tb_mutasi');
    }
}
