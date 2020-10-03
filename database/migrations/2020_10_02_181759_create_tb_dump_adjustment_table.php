<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDumpAdjustmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dump_adjustment', function (Blueprint $table) {
            $table->string('no_so', 15);
            $table->date('tanggal');
            $table->string('kasir', 15);
            $table->longText('note');
            $table->longText('catatan');
            $table->string('posisi', 25);
            $table->double('subtotal');
            $table->string('kode_barang', 6);
            $table->longText('nama');
            $table->integer('stok');
            $table->integer('jumlah');
            $table->integer('hasil');
            $table->double('harga');
            $table->double('total');
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
        Schema::dropIfExists('tb_dump_adjustment');
    }
}
