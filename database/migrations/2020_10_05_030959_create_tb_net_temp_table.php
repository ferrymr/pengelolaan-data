<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbNetTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_net_temp', function (Blueprint $table) {
            $table->string('row_id', 5);
            $table->string('no_member', 5);
            $table->string('kode_up', 5);
            $table->string('kode_dr', 5);

            $table->primary(['row_id','no_member']);
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
        Schema::dropIfExists('tb_net_temp');
    }
}
