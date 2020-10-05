<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadPackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_pack', function (Blueprint $table) {
            $table->string('kode_pack', 6)->primary();
            $table->string('nama_pack', 50)->nullable();
            $table->string('jenis_pack', 25)->nullable();
            $table->integer('stok')->nullable();
            $table->integer('poin');
            $table->double('h_hpb');
            $table->double('h_ppns');
            $table->double('h_member')->nullable();
            $table->double('h_nomem')->nullable();
            $table->double('h_res')->nullable();
            $table->string('pic');
            $table->double('berat');
            $table->integer('cat');
            $table->integer('bpom');
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
        Schema::dropIfExists('tb_head_pack');
    }
}
