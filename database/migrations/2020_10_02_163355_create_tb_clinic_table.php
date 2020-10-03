<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_clinic', function (Blueprint $table) {
            $table->string('kode_barang', 6)->primary();
            $table->string('nama', 35)->nullable();
            $table->string('jenis', 25)->nullable();
            $table->double('stok')->nullable();
            $table->double('h_member')->nullable();
            $table->double('h_hpb');
            $table->double('h_nomem')->nullable();
            $table->double('h_hpp')->nullable();
            $table->integer('h_ppnj');
            $table->integer('h_beli');
            $table->integer('h_ppnb');
            $table->double('berat')->nullable();
            $table->string('satuan', 5)->nullable();
            $table->double('per');
            $table->string('pos', 5);
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
        Schema::dropIfExists('tb_clinic');
    }
}
