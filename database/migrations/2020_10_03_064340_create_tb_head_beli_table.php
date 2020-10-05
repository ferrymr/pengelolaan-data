<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_beli', function (Blueprint $table) {
            $table->string('no_po', 15)->primary();
            $table->date('tanggal')->nullable();
            $table->string('kode_supp', 5)->nullable();
            $table->string('nama', 50)->nullable();
            $table->double('sub_total')->nullable();
            $table->longText('note')->nullable();
            $table->date('tempo');
            $table->string('kassir', 15);
            $table->string('waktu', 12);
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
        Schema::dropIfExists('tb_head_beli');
    }
}
