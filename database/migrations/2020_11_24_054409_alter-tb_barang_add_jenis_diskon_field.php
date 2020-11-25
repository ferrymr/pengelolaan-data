<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbBarangAddJenisDiskonField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_barang', 'jenis_diskon')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->string('jenis_diskon')->after('cat')->nullable();
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
        if (Schema::hasColumn('tb_barang', 'jenis_diskon')) {
            Schema::table('tb_barang', function(Blueprint $table) {
                $table->dropColumn('jenis_diskon');
            });
        }
    }
}
