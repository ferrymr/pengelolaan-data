<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_saldo', function (Blueprint $table) {
            $table->string('no_urut', 5);
            $table->date('tgl_masuk')->nullable();
            $table->string('no_member');
            $table->string('nama')->nullable();
            $table->double('saldo_a')->nullable();
            $table->double('jumlah')->nullable();
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
        Schema::dropIfExists('tb_saldo');
    }
}
