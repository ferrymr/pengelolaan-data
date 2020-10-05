<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHisSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_his_series', function (Blueprint $table) {
            $table->string('operator', 10);
            $table->date('tanggal');
            $table->string('kode_pack', 6);
            $table->longText('nama');
            $table->integer('jumlah');
            $table->string('posisi', 5);
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
        Schema::dropIfExists('tb_his_series');
    }
}
