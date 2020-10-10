<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 20);
            $table->string('nama_produk', 75);
            $table->string('jenis', 20);
            $table->mediumText('gambar');
            $table->string('nama_file', 75);
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
        Schema::dropIfExists('tb_gallery');
    }
}
