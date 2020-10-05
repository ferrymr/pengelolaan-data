<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_supplier', function (Blueprint $table) {
            $table->string('kode_supp', 5)->primary();
            $table->string('nama', 35)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('kota', 25)->nullable();
            $table->string('pos', 5)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('email', 50);
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
        Schema::dropIfExists('tb_supplier');
    }
}
