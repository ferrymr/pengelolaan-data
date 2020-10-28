<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCashbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cashback', function (Blueprint $table) {
            $table->string('no_member', 5)->primary();
            $table->string('nama', 50);
            $table->integer('pp');
            $table->integer('pgp');
            $table->integer('pgl');
            $table->integer('pr');
            $table->string('title', 3);
            $table->integer('prs');
            $table->double('cb_pribadi');
            $table->double('cb_group');
            $table->double('rabat');
            $table->double('sponsor');
            $table->double('cb_total');
            $table->date('tanggal');
            $table->string('kode_dr', 5);
            $table->string('kode_up', 5);
            $table->integer('mark');
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
        Schema::dropIfExists('tb_cashback');
    }
}
