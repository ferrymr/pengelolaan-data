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
            $table->string('nama', 50)->nullable();
            $table->date('reg');
            $table->integer('pp');
            $table->double('sales_pribadi')->nullable();
            $table->integer('pgp');
            $table->double('sales_group_pribadi');
            $table->integer('pgl');
            $table->double('sales_group_level');
            $table->integer('pr');
            $table->double('sales_rabat');
            $table->string('title', 3);
            $table->integer('prs')->nullable();
            $table->double('cb_pribadi')->nullable();
            $table->double('cb_group')->nullable();
            $table->double('rabat');
            $table->double('cb_total')->nullable();
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
