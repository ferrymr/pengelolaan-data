<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TAMBAHKAN FIELD-FIELD YANG DI CN_CUSTOMERS KE TABLE USERS
        // CARI CARA SUPAYA BISA PREFIX SEMUA TABLE BIAR GAK LIEUR
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_member')->nullable();
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('google_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // TAMBAHAN
            $table->timestamp('daftar')->nullable();
            $table->string('nik',16)->nullable();
            $table->string('alamat')->nullable();
            $table->string('propinsi',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('bank')->nullable();
            $table->string('norek')->nullable();
            $table->string('atn')->nullable();
            $table->string('kode_up',5)->nullable();
            $table->string('kode_dr',5)->nullable();
            $table->string('apro',10)->nullable();
            $table->string('gen_otp',5)->nullable();
            $table->string('tipe',8)->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
