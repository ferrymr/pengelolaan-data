<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->string('no_member', 5);
            $table->string('kode_barang', 6);
            $table->string('nama', 60)->nullable();
            $table->string('jenis', 30)->nullable();
            $table->integer('stok')->nullable();
            $table->integer('poin');
            $table->double('h_hpb');
            $table->double('h_member')->nullable();
            $table->double('h_nomem')->nullable();
            $table->integer('stok_his');
            $table->longText('log_his');
            $table->integer('status');
            $table->string('berat', 6);
            $table->integer('bpom');
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
        Schema::dropIfExists('tb_produk');
    }
}
