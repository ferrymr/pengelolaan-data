<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_shipping_address', 'nama_pengirim')) {
            Schema::table('tb_shipping_address', function(Blueprint $table) {
                $table->string('nama_pengirim')->after('no_member')->nullable();
            });
        }

        if (!Schema::hasColumn('tb_shipping_address', 'telepon_pengirim')) {
            Schema::table('tb_shipping_address', function(Blueprint $table) {
                $table->string('telepon_pengirim')->after('nama_pengirim')->nullable();
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
        if (Schema::hasColumn('tb_shipping_address', 'nama_pengirim')) {
            Schema::table('tb_shipping_address', function(Blueprint $table) {
                $table->dropColumn('nama_pengirim');
            });
        }

        if (Schema::hasColumn('tb_shipping_address', 'telepon_pengirim')) {
            Schema::table('tb_shipping_address', function(Blueprint $table) {
                $table->dropColumn('telepon_pengirim');
            });
        }
    }
}
