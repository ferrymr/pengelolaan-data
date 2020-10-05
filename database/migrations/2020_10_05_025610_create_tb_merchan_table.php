<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMerchanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_merchan', function (Blueprint $table) {
            $table->string('kode_dr', 5);
            $table->string('kode_up', 5);
            $table->string('no_member', 5);
            $table->string('nama', 25)->nullable();
            $table->longText('alamat');
            $table->string('kota', 25);
            $table->string('telp', 20);
            $table->date('tanggal')->nullable();
            $table->double('sales');
            $table->timestamps();

            $table->primary(['kode_dr','kode_up','no_member','tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_merchan');
    }
}
