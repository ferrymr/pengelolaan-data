<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->string('no_member');
            $table->binary('nik');
            $table->date('tanggal')->nullable();
            $table->string('nama', 35)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('propinsi', 50);
            $table->string('kota', 50)->nullable();
            $table->string('kecamatan', 50);
            $table->string('pos', 5)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('kode_dr', 5)->nullable();
            $table->string('kode_up', 5)->nullable();
            $table->string('status', 10)->nullable();
            $table->double('saldo')->nullable();
            $table->string('no_ktp', 30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->longText('note')->nullable();
            $table->string('tabungan', 15);
            $table->longText('norek');
            $table->string('atn', 50)->nullable();
            $table->string('jenis', 10);
            $table->longText('email')->nullable();
            $table->date('re_reg');
            $table->string('q_tipe', 1);
            $table->string('pwd', 20);
            $table->string('kredit', 1);
            $table->string('operator', 10);
            $table->string('reg', 5);
            $table->integer('train');
            $table->longText('ver');
            $table->longText('photo');
            $table->integer('promo');
            $table->integer('promo_2');
            $table->integer('qm');
            $table->integer('rm');
            $table->string('gen_otp', 5);
            $table->string('apro', 10);
            $table->integer('founder');
            $table->string('tipe', 8)->nullable();
            $table->string('login_token', 50);
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
        Schema::dropIfExists('tb_member');
    }
}
