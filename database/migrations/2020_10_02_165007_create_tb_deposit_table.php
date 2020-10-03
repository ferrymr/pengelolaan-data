<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_deposit', function (Blueprint $table) {
            $table->string('no_trans', 20)->primary();
            $table->date('tanggal');
            $table->string('no_member', 5);
            $table->longText('nama');
            $table->string('trans', 10);
            $table->double('debit');
            $table->double('kredit');
            $table->double('saldo');
            $table->time('waktu');
            $table->longText('note');
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
        Schema::dropIfExists('tb_deposit');
    }
}
