<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetReturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_retur', function (Blueprint $table) {
            $table->string('no_retur', 15);
            $table->string('no_trans', 15);
            $table->string('kode_barang', 5);
            $table->string('nama', 50)->nullable();
            $table->string('jenis', 35);
            $table->integer('jumlah')->nullable();
            $table->double('harga')->nullable();
            $table->double('total')->nullable();
            $table->longText('note');
            $table->timestamps();
            $table->primary(['no_retur','no_trans','kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_retur');
    }
}
