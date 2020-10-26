<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDesProTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_des_pro', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('des_singkat')->nullable();
            $table->text('manfaat')->nullable();
            $table->text('des1')->nullable();
            $table->text('des2')->nullable();
            $table->text('pakai')->nullable();
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
        Schema::dropIfExists('tb_des_pro');
    }
}
