<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_order', function (Blueprint $table) {
            $table->string('no_order', 15)->primary();
            $table->date('tanggal')->nullable();
            $table->string('kode_cust', 18)->nullable();
            $table->string('nama', 35)->nullable();
            $table->double('sub_total')->nullable();
            $table->string('trans', 6)->nullable();
            $table->string('bayar', 8)->nullable();
            $table->string('cc', 12)->nullable();
            $table->date('tempo')->nullable();
            $table->double('saldo')->nullable();
            $table->string('kassir', 15)->nullable();
            $table->longText('note')->nullable();
            $table->longText('alamat')->nullable();
            $table->date('tgl')->nullable();
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
        Schema::dropIfExists('tb_head_order');
    }
}
