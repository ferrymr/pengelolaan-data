<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_jual', function (Blueprint $table) {
            $table->string('no_do')->primary();
            $table->date('tanggal')->nullable();
            $table->string('kode_cust', 18)->nullable();
            $table->string('nama', 35)->nullable();
            $table->double('sub_total')->nullable();
            $table->double('pay');
            $table->double('balance');
            $table->string('trans', 6)->nullable();
            $table->string('bayar', 8)->nullable();
            $table->string('cc', 12)->nullable();
            $table->date('tempo')->nullable();
            $table->double('saldo')->nullable();
            $table->string('kassir', 15)->nullable();
            $table->longText('note')->nullable();
            $table->longText('alamat')->nullable();
            $table->date('tgl')->nullable();
            $table->string('waktu');
            $table->string('mark');
            $table->string('no_order');
            $table->integer('move');
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
        Schema::dropIfExists('tb_head_jual');
    }
}
