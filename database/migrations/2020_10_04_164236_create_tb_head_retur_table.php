<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadReturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_retur', function (Blueprint $table) {
            $table->string('no_retur')->primary();
            $table->date('tanggal')->nullable();
            $table->string('jenis', 10)->nullable();
            $table->double('sub_total')->nullable();
            $table->string('kassir', 10);
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
        Schema::dropIfExists('tb_head_retur');
    }
}
