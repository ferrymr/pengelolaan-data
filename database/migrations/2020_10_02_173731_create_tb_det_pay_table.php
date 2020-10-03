<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_pay', function (Blueprint $table) {
            $table->string('no_pay', 15);
            $table->string('no_do', 15);
            $table->double('sub_total');
            $table->double('bayar');
            $table->string('trans', 5);
            $table->string('cc', 10);
            $table->string('bank', 8);
            $table->timestamps();
            $table->primary(['no_pay','no_do','trans','bank']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_pay');
    }
}
