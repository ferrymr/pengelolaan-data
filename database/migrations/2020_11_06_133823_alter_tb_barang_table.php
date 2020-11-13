<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_barang', 'hpp')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->double('hpp')->after('h_member')->nullable();
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
        if (Schema::hasColumn('tb_barang', 'hpp')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->dropColumn('hpp');
            });
        }
    }
}
