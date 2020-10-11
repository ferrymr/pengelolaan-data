<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_pay', function (Blueprint $table) {
            $table->string('no_pay', 15)->primary();
            $table->date('tanggal');
            $table->string('no_member', 5);
            $table->string('nama', 50);
            $table->double('total_bayar');
            $table->string('kassir', 10);
            $table->string('waktu', 12);
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
        Schema::dropIfExists('tb_head_pay');
    }
}
