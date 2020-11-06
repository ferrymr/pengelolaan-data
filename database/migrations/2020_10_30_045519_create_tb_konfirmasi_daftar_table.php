<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKonfirmasiDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konfirmasi_daftar', function (Blueprint $table) {
            $table->id();
            $table->integer('tb_daftar_member_id');
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
        Schema::dropIfExists('tb_konfirmasi_daftar');
    }
}
