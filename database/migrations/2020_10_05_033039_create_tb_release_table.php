<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbReleaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_release', function (Blueprint $table) {
            $table->string('kode_rk', 15);
            $table->string('no_member', 5)->nullable();
            $table->date('tanggal_r')->nullable();
            $table->double('cb_pribadi')->nullable();
            $table->double('cb_lv1')->nullable();
            $table->double('cb_lv2')->nullable();
            $table->double('saldo_a')->nullable();
            $table->double('total_cb')->nullable();
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
        Schema::dropIfExists('tb_release');
    }
}
