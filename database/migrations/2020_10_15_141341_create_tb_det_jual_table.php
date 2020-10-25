<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_det_jual', function (Blueprint $table) {
            $table->id();
            $table->integer('tb_head_jual_id');
            $table->string('no_do', 15);            
            $table->string('kode_barang', 6);
            $table->string('nama', 50); // plan to remove
            $table->string('jenis', 50); // plan to remove
            $table->integer('jumlah')->nullable(); // qty
            $table->double('harga')->nullable();
            $table->double('total')->nullable(); // subtotal
            $table->double('t_hpb')->comment('not used'); // not used
            $table->integer('poin'); // total_point
            $table->string('no_ref', 5); // plan to remove
            $table->integer('bpom'); // plan to remove
            $table->text('note'); // additional
            $table->integer('promo'); // additional
            $table->timestamps();

            // $table->primary(['no_do', 'kode_barang', 'nama', 'jenis']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_det_jual');
    }
}
