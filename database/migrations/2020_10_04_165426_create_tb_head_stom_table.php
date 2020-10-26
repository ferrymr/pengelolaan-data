<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadStomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_stom', function (Blueprint $table) {
            $table->string('no_sm', 15)->primary();
            $table->string('no_member', 5)->nullanle();
            $table->string('nama', 35)->nullanle();
            $table->date('tgl_pinjam')->nullanle();
            $table->date('tgl_kembai')->nullanle();
            $table->longText('keterangan')->nullanle();
            $table->longText('tipe_move');
            $table->string('kassir', 15);
            $table->string('waktu', 12);
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
        Schema::dropIfExists('tb_head_stom');
    }
}
