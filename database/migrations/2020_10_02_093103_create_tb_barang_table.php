<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 6)->unique();
            $table->string('nama', 35)->nullable();
            $table->string('jenis', 25)->nullable();
            $table->integer('stok')->nullable()->default(0);
            $table->string('poin', 11)->nullable()->default(0);
            $table->string('tipe_kulit', 11)->nullable(); // shop
            // $table->double('h_hpb'); // shop g d pakai lg
            // $table->double('h_ppnj');
            $table->double('h_nomem')->nullable();
            $table->double('h_member')->nullable();
            // $table->double('h_beli');
            // $table->double('h_ppnb');
            // $table->double('h_hpp')->nullable();
            $table->float('berat')->nullable();
            $table->string('satuan', 10)->nullable(); // shop
            $table->integer('bpom')->nullable();
            $table->date('tgl_eks')->comment('Tanggal expired');
            $table->string('stats')->nullable()->comment('Status publish atau tidak');
            // $table->integer('stok_his');
            // $table->longText('log_his');
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
        Schema::dropIfExists('tb_barang');
    }
}
