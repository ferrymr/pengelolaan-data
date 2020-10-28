<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetPackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_pack', function (Blueprint $table) {
            $table->string('kode_pack', 5);
            $table->string('kode_barang', 5);
            $table->string('nama', 35);
            $table->integer('jumlah');
            $table->primary(['kode_pack','kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_pack');
    }
}
