<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKonfirmasiJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konfirmasi_jual', function (Blueprint $table) {
            $table->id();
            $table->integer('tb_head_jual_id');
            $table->integer('user_id');
            $table->string('bank');
            $table->string('rekening_number')->nullable();
            $table->string('rekening_name')->nullable();
            $table->string('filename')->nullable();
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
        Schema::dropIfExists('tb_konfirmasi_jual');
    }
}
