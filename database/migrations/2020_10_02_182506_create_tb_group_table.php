<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_group', function (Blueprint $table) {
            $table->string('no_member', 5);
            $table->string('nama', 50);
            $table->date('tanggal');
            $table->double('grup');
            $table->double('rabat');
            $table->double('bonus');
            $table->double('recruit');
            $table->string('tabungan', 15);
            $table->string('no_rek', 25);
            $table->string('kode_dr', 5);
            $table->string('kode_up', 5);
            $table->string('status', 1);
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
        Schema::dropIfExists('tb_group');
    }
}
