<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_beli', function (Blueprint $table) {
            $table->string('no_po', 15);
            $table->string('kode_barang', 6);
            $table->string('jenis', 25)->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('harga')->nullable();
            $table->double('total')->nullable();
            $table->integer('per');
            $table->timestamps();
            $table->primary(['no_po','kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_beli');
    }
}
