<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCb2020Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cb_2020', function (Blueprint $table) {
            $table->string('no_member', 5)->primary();
            $table->string('nama', 50);
            $table->date('reg');
            $table->date('tanggal');
            $table->string('kode_up', 5);
            $table->string('kode_dr', 5);
            $table->integer('nr');
            $table->integer('rm');
            $table->double('sales');
            $table->string('title', 3);
            $table->integer('pp');
            $table->integer('pg');
            $table->double('sgp');
            $table->integer('pgs');
            $table->double('sgs');
            $table->integer('led');
            $table->integer('man');
            $table->integer('sen');
            $table->integer('exe');
            $table->integer('dir');
            $table->integer('fall');
            $table->string('last_rec', 3);
            $table->double('cbp');
            $table->double('cb1');
            $table->double('cb2');
            $table->double('cgp');
            $table->double('cgl');
            $table->double('total_cb');
            $table->dateTime('waktu');
            $table->double('pgg');
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
        Schema::dropIfExists('tb_cb_2020');
    }
}
