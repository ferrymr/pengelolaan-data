<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHeadJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_head_jual', function (Blueprint $table) {
            $table->id(); // additional
            $table->string('no_do')->nullable();
            $table->date('tanggal')->nullable()->comment('plan to remove'); // plan to remove
            // $table->string('kode_cust', 18)->nullable(); // change to user_id
            $table->integer('user_id')->nullable(); // additional
            $table->string('nama', 35)->nullable()->comment('plan to remove'); // plan to remove
            $table->double('sub_total')->nullable(); // in the shop is subtotal
            $table->double('pay')->nullable();
            $table->double('balance')->nullable();
            $table->string('trans', 6)->nullable()->comment('methode pembayaran - stokist'); // == methode pembayaran
            $table->string('bayar', 8)->nullable()->comment('methode pembayaran detail - stokist'); // == methode pembayaran detail
            $table->string('cc', 12)->nullable()->comment('nama bank - stokist'); // == nama bank
            $table->date('tempo')->nullable()->comment('cicilan - stokist');
            $table->double('saldo')->nullable()->comment('sisa saldo - stokist');
            $table->string('kassir', 15)->nullable()->comment('plan to remove'); // plan to remove (ganti jadi user_id kasir)
            $table->longText('note')->nullable();
            $table->longText('alamat')->nullable()->comment('plan to remove'); // plan to remove
            $table->date('tgl')->nullable()->comment('plan to remove'); // plan to remove
            $table->string('waktu')->comment('plan to remove'); // plan to remove
            $table->integer('shipping_address_id')->nullable(); // additional
            $table->string('metode_pengiriman')->nullable(); // additional
            $table->string('kurir')->nullable(); // additional
            $table->double('shipping_fee')->nullable(); // additional
            $table->double('grand_total')->nullable(); // additional
            $table->double('total_berat')->nullable(); // additional
            $table->double('total_item')->nullable(); // additional
            $table->double('total_poin')->nullable(); // additional
            $table->string('jenis_platform')->nullable(); // additional
            $table->string('kode_spb')->nullable(); // todo move to user that status is stockist
            // $table->string('kode_aff')->nullable(); // todo move to user that status is reseller
            $table->string('status_transaksi')->nullable(); // additional
            // $table->string('resi')->nullable(); // additional // removed
            $table->string('bank')->nullable();
            $table->string('mark')->nullable();
            $table->string('no_order')->nullable()->comment('plan to remove');
            $table->integer('move')->nullable(); 
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
        Schema::dropIfExists('tb_head_jual');
    }
}
