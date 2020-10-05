<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbQualifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_qualified', function (Blueprint $table) {
            $table->string('no_ambil', 8);
            $table->string('no_member', 5);
            $table->date('tanggal')->nullable();
            $table->date('tgl_k')->nullable();
            $table->string('q_tipe', 1)->nullable();
            $table->string('status', 5)->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('tb_qualified');
    }
}
