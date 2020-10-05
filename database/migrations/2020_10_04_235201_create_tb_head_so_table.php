<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadSoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_so', function (Blueprint $table) {
            $table->string('no_so', 15)->primary();
            $table->date('tanggal')->nullable();
            $table->string('kasir', 8)->nullable();
            $table->longText('jenis')->nullable();
            $table->longText('catatan')->nullable();
            $table->longText('note')->nullable();
            $table->double('sub_total');
            $table->string('pos', 5);
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
        Schema::dropIfExists('tb_head_so');
    }
}
