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
            $table->id();
            $table->string('kode_pack', 5)->unique();
            $table->string('nama_pack', 50);
            $table->integer('poin');
            $table->double('h_member');
            $table->double('h_nomem');
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
