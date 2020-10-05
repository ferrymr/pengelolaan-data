<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbStokAwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_stok_awal', function (Blueprint $table) {
            $table->string('kode_barang', 6);
            $table->integer('stok');
            $table->string('posisi');
            $table->date('tanggal');
            $table->string('tipe', 6);
            $table->timestamps();

            $table->primary(['kode_barang', 'posisi', 'tanggal', 'tipe']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_stok_awal');
    }
}
