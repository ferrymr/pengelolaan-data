<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cash', function (Blueprint $table) {
            $table->string('faktur', 15)->primary();
            $table->string('no_doc', 15);
            $table->date('tanggal');
            $table->string('no_member', 5)->nullable();
            $table->longText('nama');
            $table->string('trans', 10)->nullable();
            $table->string('jenis', 10);
            $table->string('bank', 10);
            $table->double('debit');
            $table->double('kredit');
            $table->double('saldo');
            $table->time('waktu');
            $table->longText('note');
            $table->string('kassir', 15);
            $table->date('tgl_bayar');
            $table->double('t_bayar');
            $table->double('kembali');
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
        Schema::dropIfExists('tb_cash');
    }
}
