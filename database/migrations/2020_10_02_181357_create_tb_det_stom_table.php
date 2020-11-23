<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetStomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_stom', function (Blueprint $table) {
            $table->id();
            $table->string('tb_head_stom_id');
            $table->string('no_sm', 15);
            $table->string('kode_barang', 6);
            $table->string('nama_barang', 35)->nullable();
            $table->string('jenis', 25)->nullable();
            $table->integer('jumlah')->nullable();
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
        Schema::dropIfExists('tb_det_stom');
    }
}
