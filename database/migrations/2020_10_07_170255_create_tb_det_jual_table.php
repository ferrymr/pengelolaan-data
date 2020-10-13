<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_jual', function (Blueprint $table) {
            $table->string('no_do', 15);
            $table->string('kode_barang', 6);
            $table->string('nama', 50);
            $table->string('jenis', 50);
            $table->integer('jumlah')->nullable();
            $table->double('harga')->nullable();
            $table->double('total')->nullable();
            $table->double('t_hpb');
            $table->integer('poin');
            $table->string('no_ref', 5);
            $table->integer('bpom');
            $table->timestamps();
            $table->primary(['no_do','kode_barang','nama','jenis']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_jual');
    }
}
