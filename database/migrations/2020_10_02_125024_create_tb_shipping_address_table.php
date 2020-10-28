<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_shipping_address', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('no_member');
            $table->string('nama');
            $table->string('telepon');
            $table->integer('provinsi_id');
            $table->string('provinsi_nama');
            $table->integer('kota_id');
            $table->string('kota_nama');
            $table->integer('kecamatan_id');
            $table->string('kecamatan_nama');
            $table->text('alamat');
            $table->string('kode_pos');
            $table->integer('is_default');
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
        Schema::dropIfExists('tb_shipping_address');
    }
}
