<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBarangSpbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang_spb', function (Blueprint $table) {
            $table->id();
            $table->string('no_member');
            $table->string('kode_barang', 6);
            $table->string('nama', 35);
            $table->string('jenis', 25);
            $table->integer('stok');
            $table->integer('poin')->nullable();
            $table->double('h_nomem')->nullable();
            $table->double('h_member')->nullable();
            $table->float('berat')->nullable();
            $table->string('satuan', 10)->nullable(); // shop
            $table->integer('bpom')->nullable();
            $table->date('tgl_eks')->nullable();
            $table->string('stats')->nullable()->comment('Status publish atau tidak');
            $table->string('pic', 50)->nullable(); // shop
            $table->integer('cat')->nullable()->comment('Produk non-bpom tidak ditampilkan')->default(1); // shop 
            $table->integer('diskon')->nullable(); // shop
            $table->string('unit')->default('PIECES'); // shop
            $table->text('deskripsi')->nullable();
            $table->text('cara_pakai')->nullable();
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
        Schema::dropIfExists('tb_barang_spb');
    }
}
