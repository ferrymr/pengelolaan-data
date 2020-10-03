<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetRef extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_ref', function (Blueprint $table) {
            $table->string('kode_dr', 5);
            $table->string('no_member', 5);
            $table->string('nama', 35)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('kode_up', 5)->nullable();
            $table->timestamps();
            $table->primary(['kode_dr','no_member']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_ref');
    }
}
