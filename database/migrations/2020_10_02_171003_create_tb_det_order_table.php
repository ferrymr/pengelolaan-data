<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_order', function (Blueprint $table) {
            $table->string('no_order', 15);
            $table->string('kode_barang', 6);
            $table->string('nama', 35)->nullable();
            $table->string('jenis', 25)->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('harga')->nullable();
            $table->double('total')->nullable();
            $table->string('no_ref', 5)->nullable();
            $table->timestamps();
            $table->primary(['no_order','kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_order');
    }
}
