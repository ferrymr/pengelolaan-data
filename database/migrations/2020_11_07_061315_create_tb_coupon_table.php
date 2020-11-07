<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_coupon', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description');
            // $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->double('value')->nullable();
            // $table->integer('tb_barang_id')->nullable();
            $table->boolean('flag_jenis')->default(1);
            $table->boolean('flag_active')->default(1);
            $table->date('expired')->nullable();
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
        Schema::dropIfExists('tb_coupon');
    }
}
