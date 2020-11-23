<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetSoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_so', function (Blueprint $table) {
            $table->string('no_so', 15);
            $table->string('kode_barang', 6);
            $table->string('nama', 35)->nullable();
            $table->double('stok')->nullable();
            $table->double('jumlah')->nullable();
            $table->double('hasil')->nullable();
            $table->timestamps();
            $table->primary(['no_so','kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_so');
    }
}
