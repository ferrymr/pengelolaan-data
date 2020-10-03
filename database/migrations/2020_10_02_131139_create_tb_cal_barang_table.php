<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCalBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cal_barang', function (Blueprint $table) {
            $table->string('kode_barang', 6)->primary();
            $table->longText('nama');
            $table->string('jenis', 25);
            $table->string('posisi', 5);
            $table->integer('jumlah');
            $table->double('h_member');
            $table->double('h_nomem');
            $table->double('h_hpp');
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
        Schema::dropIfExists('tb_cal_barang');
    }
}
