<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_movement', function (Blueprint $table) {
            $table->string('no_faktur', 15)->primary();
            $table->string('id_member', 6);
            $table->string('nama', 50);
            $table->date('tanggal');
            $table->string('jenis_movement', 30);
            $table->string('kode_barang', 6);
            $table->string('nama_barang', 35);
            $table->string('jenis_barang', 25);
            $table->integer('jumlah');
            $table->string('user', 50)->nullable();
            $table->dateTime('waktu')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('tb_movement');
    }
}
