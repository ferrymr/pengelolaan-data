<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbBarangAddFlagToNewReseller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_barang', 'flag_sell_to_reseller')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->integer('flag_sell_to_reseller')->after('flag_bestseller')->nullable();
            });
        }
        if (!Schema::hasColumn('tb_barang', 'meta_title')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->string('meta_title')->after('flag_sell_to_reseller')->nullable();
            });
        }
        if (!Schema::hasColumn('tb_barang', 'meta_description')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->text('meta_description')->after('meta_title')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('tb_barang', 'flag_sell_to_reseller')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->dropColumn('flag_sell_to_reseller');
            });
        }
        if (Schema::hasColumn('tb_barang', 'meta_title')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->dropColumn('meta_title');
            });
        }
        if (Schema::hasColumn('tb_barang', 'meta_description')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->dropColumn('meta_description');
            });
        }
    }
}
