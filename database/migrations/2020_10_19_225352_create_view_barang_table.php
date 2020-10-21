<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_barang', function (Blueprint $table) {
            $table->string('kode_barang', 6)->primary();
            $table->string('nama', 35)->nullable();
            $table->string('jenis', 25)->nullable();
            $table->integer('stok');
            $table->string('poin', 11);
            // $table->double('h_hpb');
            // $table->double('h_ppnj');
            $table->double('h_nomem')->nullable();
            $table->double('h_member')->nullable();
            // $table->double('h_beli');
            // $table->double('h_ppnb');
            // $table->double('h_hpp')->nullable();
            $table->float('berat')->nullable();
            // $table->string('satuan', 5)->nullable();
            $table->integer('bpom')->nullable();
            $table->date('tgl_eks');
            $table->string('stats')->nullable();
            // $table->integer('stok_his');
            // $table->longText('log_his');
            // $table->string('pic', 10);
            // $table->integer('cat');
            // $table->integer('diskon');
            $table->text('deskripsi')->nullable();
            $table->text('cara_pakai')->nullable();
            $table->mediumText('gambar');
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
        Schema::dropIfExists('view_barang');
    }
}
